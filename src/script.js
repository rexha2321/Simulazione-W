/**
 * WAR IMPACT SIMULATOR 2026 - Control Logic
 */

let selectedCountry = null;
let teamA = [];
let teamB = [];
let turnCount = 0;

// 1. Selezione del paese dal database laterale
function selectCountry(data) {
    selectedCountry = data;
    // Feedback visivo nel log (opzionale)
    console.log(`Target acquisito: ${data.nome}`);
    
    // Rimuove evidenza da altri paesi e la aggiunge al selezionato
    document.querySelectorAll('.c-card').forEach(el => el.style.borderColor = 'transparent');
    event.currentTarget.style.borderColor = 'var(--neon-blue)';
}

// 2. Aggiunta dei paesi alle fazioni
function addTo(side) {
    if (!selectedCountry) {
        alert("SISTEMA: Selezionare una nazione dal database prima di procedere.");
        return;
    }

    // Clonazione dell'oggetto per evitare riferimenti duplicati
    const countryClone = JSON.parse(JSON.stringify(selectedCountry));
    
    if (side === 'A') {
        teamA.push(countryClone);
    } else {
        teamB.push(countryClone);
    }

    selectedCountry = null;
    updateDisplay();
}

// 3. Esecuzione del turno (Comunicazione con PHP)
async function executeTurn() {
    if (teamA.length === 0 || teamB.length === 0) {
        alert("ERRORE OPERATIVO: Entrambe le fazioni devono avere almeno un'unità attiva.");
        return;
    }

    const loader = document.querySelector('.glitch');
    loader.innerText = "CALCOLO IMPATTO IN CORSO...";

    try {
        const response = await fetch('index.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fazioneA: teamA, fazioneB: teamB })
        });

        if (!response.ok) throw new Error("Server Error");

        const result = await response.json();
        
        // Aggiorna le fazioni con i nuovi dati calcolati dal PHP
        teamA = result.fazioneA;
        teamB = result.fazioneB;
        turnCount++;
        
        updateDisplay();
        updateGlobalTicker();

    } catch (error) {
        console.error("Errore di simulazione:", error);
        alert("CRITICAL FAILURE: Connessione al motore di calcolo interrotta.");
    } finally {
        loader.innerText = "WAR IMPACT SIMULATOR 2026";
    }
}

// 4. Aggiornamento dell'Interfaccia (Dashboard)
function updateDisplay() {
    const renderFaction = (list, containerId) => {
        const container = document.querySelector(`#${containerId} .unit-list`);
        container.innerHTML = list.map(p => {
            // Calcolo percentuali per le barre grafiche
            const stabPercent = Math.max(0, p.sociale.stabilita * 100);
            const ecoPercent = Math.max(0, 100 - p.stato.stress_economico_locale);
            
            return `
                <div class="unit-stats">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-size:1.1rem;">${p.flag} <strong>${p.nome.toUpperCase()}</strong></span>
                        <span style="color:var(--neon-yellow); font-size:0.7rem;">RANK: #${p.gfp_rank}</span>
                    </div>

                    <div style="margin: 10px 0; display:grid; grid-template-columns: 1fr 1fr; gap:5px;">
                        <div>💀 MIL: <span style="color:white">${Math.floor(p.stato.perdite_mil).toLocaleString()}</span></div>
                        <div>🏘️ CIV: <span style="color:white">${Math.floor(p.stato.perdite_civ).toLocaleString()}</span></div>
                    </div>

                    <div style="display:flex; justify-content:space-between; font-size:0.65rem;">
                        <span>STABILITÀ INTERNA</span>
                        <span>${stabPercent.toFixed(0)}%</span>
                    </div>
                    <div class="status-bar-container">
                        <div class="status-bar-fill fill-stabilita" style="width: ${stabPercent}%"></div>
                    </div>

                    <div style="display:flex; justify-content:space-between; font-size:0.65rem;">
                        <span>TENUTA FINANZIARIA</span>
                        <span>${ecoPercent.toFixed(0)}%</span>
                    </div>
                    <div class="status-bar-container">
                        <div class="status-bar-fill fill-economia" style="width: ${ecoPercent}%"></div>
                    </div>

                    <div class="data-grid" style="display:grid; grid-template-columns: 1fr 1fr; font-size:0.7rem;">
                        <span>📈 INFL: ${p.stato.inflazione.toFixed(1)}%</span>
                        <span>💰 PIL: ${p.economico.pil.toFixed(0)}B $</span>
                    </div>

                    ${p.sociale.stabilita < 0.4 ? '<span class="alert-text">⚠️ COLLASSO GOVERNATIVO IMMINENTE</span>' : ''}
                    ${p.stato.sfollati > 100000 ? '<span class="alert-text">🛂 CRISI MIGRATORIA ACUTA</span>' : ''}
                </div>
            `;
        }).join('');
    };

    renderFaction(teamA, 'teamA');
    renderFaction(teamB, 'teamB');
}

// 5. Aggiornamento barra di stato superiore
function updateGlobalTicker() {
    const ticker = document.getElementById('global-ticker');
    const riskLevel = turnCount > 5 ? "CRITICO" : "IN ESCALATION";
    ticker.innerHTML = `MESE DI CONFLITTO: ${turnCount} | LIVELLO RISCHIO: ${riskLevel} | ANALISI SISTEMICA ATTIVA`;
}