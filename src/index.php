<?php
$paesi_europei = [
    // --- GRANDI POTENZE ---
    "Russia" => [
        "flag" => "🇷🇺", "gfp_rank" => 2, "territorio" => "vasto_freddo",
        "militare" => ["attivi" => 1350000, "riservisti" => 2000000, "tecnologia" => 0.85, "logistica" => 0.70, "carri" => 12500, "caccia" => 800, "navi" => 16],
        "economico" => ["pil" => 2200, "debito" => 18, "capacita_industriale" => 0.90, "dipendenza_energetica" => 0.05],
        "sociale" => ["stabilita" => 0.75, "consenso" => 0.70, "urbanizzazione" => 0.75, "sanita" => 0.70, "popolazione" => 144.5]
    ],
    "Regno Unito" => [
        "flag" => "🇬🇧", "gfp_rank" => 8, "territorio" => "isola",
        "militare" => ["attivi" => 190000, "riservisti" => 80000, "tecnologia" => 0.96, "logistica" => 0.95, "carri" => 213, "caccia" => 125, "navi" => 12],
        "economico" => ["pil" => 4000, "debito" => 100, "capacita_industriale" => 0.85, "dipendenza_energetica" => 0.40],
        "sociale" => ["stabilita" => 0.85, "consenso" => 0.65, "urbanizzazione" => 0.84, "sanita" => 0.90, "popolazione" => 67.8]
    ],
    "Francia" => [
        "flag" => "🇫🇷", "gfp_rank" => 6, "territorio" => "misto",
        "militare" => ["attivi" => 205000, "riservisti" => 35000, "tecnologia" => 0.95, "logistica" => 0.90, "carri" => 222, "caccia" => 230, "navi" => 10],
        "economico" => ["pil" => 3400, "debito" => 112, "capacita_industriale" => 0.88, "dipendenza_energetica" => 0.45],
        "sociale" => ["stabilita" => 0.80, "consenso" => 0.60, "urbanizzazione" => 0.81, "sanita" => 0.92, "popolazione" => 68.2]
    ],
    "Italia" => [
        "flag" => "🇮🇹", "gfp_rank" => 10, "territorio" => "penisola_montuosa",
        "militare" => ["attivi" => 175000, "riservisti" => 40000, "tecnologia" => 0.90, "logistica" => 0.85, "carri" => 200, "caccia" => 100, "navi" => 13],
        "economico" => ["pil" => 2400, "debito" => 145, "capacita_industriale" => 0.85, "dipendenza_energetica" => 0.75],
        "sociale" => ["stabilita" => 0.75, "consenso" => 0.65, "urbanizzazione" => 0.71, "sanita" => 0.90, "popolazione" => 58.9]
    ],
    "Germania" => [
        "flag" => "🇩🇪", "gfp_rank" => 14, "territorio" => "pianura",
        "militare" => ["attivi" => 185000, "riservisti" => 30000, "tecnologia" => 0.92, "logistica" => 0.95, "carri" => 266, "caccia" => 140, "navi" => 11],
        "economico" => ["pil" => 5100, "debito" => 65, "capacita_industriale" => 0.95, "dipendenza_energetica" => 0.60],
        "sociale" => ["stabilita" => 0.85, "consenso" => 0.55, "urbanizzazione" => 0.77, "sanita" => 0.95, "popolazione" => 84.1]
    ],

    // --- PAESI NORDICI ---
    "Svezia" => [
        "flag" => "🇸🇪", "gfp_rank" => 37, "territorio" => "foreste_coste",
        "militare" => ["attivi" => 28000, "riservisti" => 30000, "tecnologia" => 0.93, "logistica" => 0.90, "carri" => 120, "caccia" => 95, "navi" => 5],
        "economico" => ["pil" => 630, "debito" => 35, "capacita_industriale" => 0.85, "dipendenza_energetica" => 0.30],
        "sociale" => ["stabilita" => 0.95, "consenso" => 0.80, "urbanizzazione" => 0.88, "sanita" => 0.94, "popolazione" => 10.6]
    ],
    "Norvegia" => [
        "flag" => "🇳🇴", "gfp_rank" => 41, "territorio" => "fiordi",
        "militare" => ["attivi" => 25000, "riservisti" => 45000, "tecnologia" => 0.94, "logistica" => 0.88, "carri" => 52, "caccia" => 52, "navi" => 10],
        "economico" => ["pil" => 560, "debito" => 40, "capacita_industriale" => 0.80, "dipendenza_energetica" => 0.05],
        "sociale" => ["stabilita" => 0.98, "consenso" => 0.85, "urbanizzazione" => 0.83, "sanita" => 0.96, "popolazione" => 5.6]
    ],
    "Finlandia" => [
        "flag" => "🇫🇮", "gfp_rank" => 48, "territorio" => "laghi_foreste",
        "militare" => ["attivi" => 30000, "riservisti" => 900000, "tecnologia" => 0.90, "logistica" => 0.92, "carri" => 200, "caccia" => 60, "navi" => 0],
        "economico" => ["pil" => 310, "debito" => 75, "capacita_industriale" => 0.75, "dipendenza_energetica" => 0.40],
        "sociale" => ["stabilita" => 0.96, "consenso" => 0.90, "urbanizzazione" => 0.86, "sanita" => 0.95, "popolazione" => 5.6]
    ],

    // --- AREA BALCANICA ---
    "Grecia" => [
        "flag" => "🇬🇷", "gfp_rank" => 30, "territorio" => "arcipelago_montuoso",
        "militare" => ["attivi" => 140000, "riservisti" => 220000, "tecnologia" => 0.88, "logistica" => 0.80, "carri" => 1365, "caccia" => 195, "navi" => 24],
        "economico" => ["pil" => 260, "debito" => 160, "capacita_industriale" => 0.60, "dipendenza_energetica" => 0.70],
        "sociale" => ["stabilita" => 0.70, "consenso" => 0.65, "urbanizzazione" => 0.80, "sanita" => 0.80, "popolazione" => 10.4]
    ],
    "Serbia" => [
        "flag" => "🇷🇸", "gfp_rank" => 56, "territorio" => "misto",
        "militare" => ["attivi" => 28000, "riservisti" => 50000, "tecnologia" => 0.75, "logistica" => 0.78, "carri" => 250, "caccia" => 16, "navi" => 0],
        "economico" => ["pil" => 85, "debito" => 52, "capacita_industriale" => 0.65, "dipendenza_energetica" => 0.60],
        "sociale" => ["stabilita" => 0.75, "consenso" => 0.80, "urbanizzazione" => 0.57, "sanita" => 0.75, "popolazione" => 6.7]
    ],
    "Croazia" => [
        "flag" => "🇭🇷", "gfp_rank" => 69, "territorio" => "costiero_montuoso",
        "militare" => ["attivi" => 16000, "riservisti" => 20000, "tecnologia" => 0.82, "logistica" => 0.85, "carri" => 72, "caccia" => 12, "navi" => 5],
        "economico" => ["pil" => 80, "debito" => 70, "capacita_industriale" => 0.55, "dipendenza_energetica" => 0.50],
        "sociale" => ["stabilita" => 0.85, "consenso" => 0.70, "urbanizzazione" => 0.58, "sanita" => 0.82, "popolazione" => 3.9]
    ],
    "Albania" => [
        "flag" => "🇦🇱", "gfp_rank" => 115, "territorio" => "montuoso",
        "militare" => ["attivi" => 9000, "riservisti" => 5000, "tecnologia" => 0.65, "logistica" => 0.70, "carri" => 0, "caccia" => 0, "navi" => 4],
        "economico" => ["pil" => 22, "debito" => 65, "capacita_industriale" => 0.40, "dipendenza_energetica" => 0.30],
        "sociale" => ["stabilita" => 0.70, "consenso" => 0.75, "urbanizzazione" => 0.62, "sanita" => 0.65, "popolazione" => 2.8]
    ],

    // --- ALTRI RILEVANTI ---
    "Polonia" => [
        "flag" => "🇵🇱", "gfp_rank" => 21, "territorio" => "pianura",
        "militare" => ["attivi" => 160000, "riservisti" => 200000, "tecnologia" => 0.88, "logistica" => 0.85, "carri" => 620, "caccia" => 95, "navi" => 2],
        "economico" => ["pil" => 820, "debito" => 50, "capacita_industriale" => 0.80, "dipendenza_energetica" => 0.30],
        "sociale" => ["stabilita" => 0.80, "consenso" => 0.75, "urbanizzazione" => 0.60, "sanita" => 0.80, "popolazione" => 37.6]
    ],
    "Turchia" => [
        "flag" => "🇹🇷", "gfp_rank" => 11, "territorio" => "montuoso_costiero",
        "militare" => ["attivi" => 450000, "riservisti" => 380000, "tecnologia" => 0.88, "logistica" => 0.88, "carri" => 2300, "caccia" => 210, "navi" => 17],
        "economico" => ["pil" => 1300, "debito" => 35, "capacita_industriale" => 0.85, "dipendenza_energetica" => 0.75],
        "sociale" => ["stabilita" => 0.65, "consenso" => 0.60, "urbanizzazione" => 0.76, "sanita" => 0.82, "popolazione" => 86.5]
    ],
    "Spagna" => [
        "flag" => "🇪🇸", "gfp_rank" => 20, "territorio" => "penisola",
        "militare" => ["attivi" => 125000, "riservisti" => 15000, "tecnologia" => 0.92, "logistica" => 0.88, "carri" => 327, "caccia" => 145, "navi" => 11],
        "economico" => ["pil" => 1700, "debito" => 110, "capacita_industriale" => 0.82, "dipendenza_energetica" => 0.70],
        "sociale" => ["stabilita" => 0.80, "consenso" => 0.55, "urbanizzazione" => 0.81, "sanita" => 0.95, "popolazione" => 47.6]
    ]
];

// Inizializzazione dati dinamici
foreach ($paesi_europei as $nome => &$dati) {
    $dati['stato'] = [
        "perdite_mil" => 0, 
        "perdite_civ" => 0, 
        "sfollati" => 0, 
        "danni_infra" => 0, 
        "inflazione" => 2.0, 
        "disoccupazione" => 7.0,
        "stress_economico_locale" => 0
    ];
}