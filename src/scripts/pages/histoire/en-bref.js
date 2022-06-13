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

const navbar = document.querySelector(".js-navbar");
const main = document.querySelector("main");

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

let lastScrollX = 0;

main.addEventListener("scroll", () => {
    const scrollX = main.scrollLeft;
    if (scrollX > lastScrollX) {
        navbar.classList.remove("navbar--open");
    } else {
        navbar.classList.add("navbar--open");
    }
    lastScrollX = scrollX;
});
