<?php
include 'paesi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $fA = $data['fazioneA'];
    $fB = $data['fazioneB'];

    function calcolaFase(&$att, &$dif) {
        // Calcolo Potenza d'Urto Totale dell'alleanza
        $pwr = 0;
        foreach ($att as $p) {
            $base = ($p['militare']['carri'] * 15) + ($p['militare']['caccia'] * 60) + ($p['militare']['attivi'] * 0.15);
            $pwr += $base * $p['militare']['tecnologia'] * $p['militare']['logistica'];
        }

        // Applicazione danni sui difensori
        foreach ($dif as &$d) {
            // Fattore Difesa (Territorio + Stabilità)
            $def = ($d['territorio'] === 'penisola_montuosa' || $d['territorio'] === 'fiordi') ? 1.6 : 1.0;
            $hit = ($pwr / count($dif)) / $def;

            // 1. Impatto Militare
            $d['stato']['perdite_mil'] += $hit * 0.08;
            
            // 2. Impatto Civile (Punto 3 del piano)
            $civ_loss = ($hit * 0.04) * ($d['sociale']['urbanizzazione'] * 2);
            $d['stato']['perdite_civ'] += $civ_loss;
            $d['stato']['sfollati'] += $civ_loss * 12;

            // 3. Impatto Economico (Punto 4)
            $d['economico']['pil'] *= (0.99 - ($d['economico']['dipendenza_energetica'] * 0.02));
            $d['stato']['inflazione'] += (rand(5, 15) / 10);
            $d['stato']['stress_economico_locale'] = (100 - ($d['economico']['pil'] / 10)); // Indice approssimativo

            // 4. Impatto Politico (Punto 1)
            $d['sociale']['stabilita'] -= ($d['stato']['perdite_civ'] > 5000) ? 0.08 : 0.02;
            if ($d['sociale']['stabilita'] < 0.3) $d['sociale']['consenso'] *= 0.9;
        }
    }

    calcolaFase($fA, $fB);
    calcolaFase($fB, $fA);

    echo json_encode(['fazioneA' => $fA, 'fazioneB' => $fB]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>S.I.G. 2026 - Strategic Impact Geopolitics</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="war-room">
    <div class="overlay"></div>
    <div id="interface">
        <header>
            <div class="glitch" data-text="WAR IMPACT SIMULATOR 2026">WAR IMPACT SIMULATOR 2026</div>
            <div id="global-ticker">STATUS: SIMULAZIONE ATTIVA | RISCHIO ESCALATION: ALTO</div>
        </header>

        <div class="grid-main">
            <aside class="intel-panel">
                <h3><span class="icon">📡</span> DATABASE GFP 2026</h3>
                <div class="search-box"><input type="text" placeholder="Cerca nazione..."></div>
                <div class="country-grid">
                    <?php foreach($paesi_europei as $nome => $d): ?>
                        <div class="c-card" onclick='selectCountry(<?= json_encode(array_merge(["nome" => $nome], $d)) ?>)'>
                            <span class="flag"><?= $d['flag'] ?></span>
                            <span class="name"><?= $nome ?></span>
                            <span class="rank">#<?= $d['gfp_rank'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </aside>

            <section class="theatre">
                <div class="factions">
                    <div id="teamA" class="f-box border-red">
                        <div class="f-header">ALLEANZA OCCIDENTALE</div>
                        <div class="unit-list"></div>
                    </div>
                    <div class="vs-logic">VS</div>
                    <div id="teamB" class="f-box border-blue">
                        <div class="f-header">BLOCCO ORIENTALE</div>
                        <div class="unit-list"></div>
                    </div>
                </div>

                <div class="command-center">
                    <button class="cmd-btn add" onclick="addTo('A')">ASSEGNA A TEAM A</button>
                    <button class="cmd-btn run" onclick="executeTurn()">AVVIA FASE DI COMBATTIMENTO</button>
                    <button class="cmd-btn add" onclick="addTo('B')">ASSEGNA A TEAM B</button>
                </div>
            </section>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>