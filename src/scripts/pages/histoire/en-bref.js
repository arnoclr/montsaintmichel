const CDN = "https://cdn.arnocellarier.fr/s/iut/msm/mp3/";

const steps = [
    "pq_ca_sappelle_le_msm",
    "qd_a_t_il_ete_construit",
    "pq_a_t_il_ete_construit",
    "par_qui_a_t_il_ete_construit",
    "quel_role_rempli_t_il",
    "d_autres_monuments_ds_ce_style",
    "cb_de_tps_pr_le_construire",
];

const audio = new Audio();

let currentStep = 0;

function changeStep(increment) {
    newStep = currentStep + increment;
    if (newStep < 0 && newStep >= steps.length) return;
    currentStep = newStep;

    audio.src = CDN + "quest_" + steps[currentStep] + ".mp3";

    audio.play();

    audio.addEventListener("ended", () => {
        audio.src = CDN + "rep_" + steps[currentStep] + ".mp3";
        audio.play();
    });
}