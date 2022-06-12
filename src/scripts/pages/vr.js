// const LOCATIONS = [
//     {
//         "name": "Chapelle Saint-Aubert",
//         "lat": "48,63653966",
//         "lng": "-1,513198375",
//         "height": "19",
//         "desc": "La chapelle Saint-Aubert est un édifice catholique de la Manche situé au Mont-Saint-Michel. Elle est construite au 12e siècle, à la base de l'îlot, au nord-ouest. Elle est dédiée à saint Aubert, évêque d'Avranches et fondateur de l'abbaye du Mont-Saint-Michel. « D'après la légende, au cours des démolitions auxquelles il fit procéder pour faire disparaître les derniers monuments du paganisme gaulois, les efforts des travailleurs ayant échoué devant un énorme menhir couronnant le sommet de la montagne, saint Aubert se serait fait amener un enfant au berceau, dont il aurait appuyé le pied sur la lourde roche qui aurait roulé incontinent au bas de la montagne. Lorsque la voix populaire déclara saint cet évêque, on éleva sur ce point, en commémoration de ce prodige, la Chapelle, dite de Saint-Aubert, campée d'une façon si pittoresque sur la crête d'un amoncellement de roches. » Elle est classée monument historique depuis le 15 février 1908 En 1947, le pignon de la chapelle est couronné d'une statue de saint Aubert.",
//         "images": ["https://upload.wikimedia.org/wikipedia/commons/c/cc/Chapelle_Saint-Aubert%2C_Mont_Saint-Michel_%28juillet_2015%29.JPG"],
//         "link": "https://fr.wikipedia.org/wiki/Chapelle_Saint-Aubert_du_Mont-Saint-Michel",
//     },
//     {
//         "name": "La Tour Gabriel",
//         "lat": "48,63554655",
//         "lng": "-1,512917574",
//         "height": "19",
//         "desc": "Cette tour était à l'époque utilisée pour défendre l'abbaye. Elle dispose à l'intérieur de ses murs larges et épais de multiples canons afin de protéger le côté ouest de l'abbaye. Elle fût construite en 1524 sur ordre du Lieutenant Gabriel du Puy. C'est ainsi la plus jeune tour de l'abbaye. A partir du XVIIeme siècle, la tour est utiliser comme moulin. Une auberge située dans le Mont aurait servi de réserve à grains.",
//         "images": ["https://cdn.pixabay.com/photo/2016/04/09/12/05/tower-1317954_1280.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Tour_St._Gabriel.jpg/1280px-Tour_St._Gabriel.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/2017-04_Mont_Saint-Michel_tour_Gabriel.jpg/1280px-2017-04_Mont_Saint-Michel_tour_Gabriel.jpg"],
//         "link": "http://www.le-mont-saint-michel.org/livre44.htm",
//     },
//     {
//         "name": "Entrée du village",
//         "lat": "48,63509581",
//         "lng": "-1,511279047",
//         "height": "19",
//         "desc": "La porte d’entrée principale du Mont est la plus ancienne porte construite connue à ce jour. Elle était protégée par un pont-levis. La porte du roi est la plus grand porte de l'abbaye. Elle permet le passage entre l'extérieur et l'entrée du village. Le village contient de nombreux chemins montants et descendants. On y trouve des habitations, des commerces, des restaurant, etc...",
//         "images": ["https://i.imgur.com/WZuF4AD.jpg"],
//         "link": "https://www.ouest-france.fr/normandie/avranches-50300/le-mont-saint-michel-un-pont-levis-tout-neuf-la-porte-du-roy-1746751",
//     },
//     {
//         "name": "Les Cachots",
//         "lat": "48,63611116",
//         "lng": "-1,5096371",
//         "height": "21",
//         "desc": "Le Mont fut transformer en Prison pour les prêtres Réfractaires et 300 d’entre eux furent enfermés. Ils seront libérés en 1799. Louix XI lui même installa des cages de fers lors de son règne.",
//         "images": ["https://i.imgur.com/T2vkXcf.jpg","https://i.imgur.com/54N1TDN.jpg"],
//         "link": "https://www.messortiesculture.com/abbaye-du-mont-saint-michel-la-bastille-des-mers-et-ses-cachots-4310",
//     },
//     {
//         "name": "Église Saint-Pierre et le cimetière",
//         "lat": "48,63615858",
//         "lng": "-1,510067564",
//         "height": "20",
//         "desc": "L'église Saint-Pierre est un édifice catholique. Elle se situe à mi-chemin de la Grand'rue et s'appuie à l'ouest contre le rocher. Depuis la fin du xixe siècle, l'édifice a le double statut d'église paroissiale et de sanctuaire de pèlerinage pour le culte de saint Michel. A côté de l'église se trouve le cimetière. La « Mère » Annette POULARD (1851-1931) habite l'une de ces tombes.",
//         "images": ["https://live.staticflickr.com/2211/32769440562_46208920fd_b.jpg", "https://i.imgur.com/sNmv7Xx.jpg", "https://i.imgur.com/IFj7XDC.jpg"],
//         "link": "https://fr.wikipedia.org/wiki/%C3%89glise_Saint-Pierre_du_Mont-Saint-Michel",
//     },
//     {
//         "name": "Logis Tiphaine",
//         "lat": "48,63630773",
//         "lng": "-1,510221788",
//         "height": "19",
//         "desc": "Cette demeure historique montre la vie d'un chevalier du Moyen-Âge, avec son équipements, son mobilier, le cabinet d'astrologie de Tiphaine de Raguenel et l'armure du chevalier Bertrand Du Guesclin. Tous les meubles présents à l'intérieur sont bel et bien les mêmes qu'au XIVeme siècle.",
//         "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg/1024px-Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg/1024px-Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg"],
//         "link": "https://www.ot-montsaintmichel.com/patrimoine-culturel/logis-tiphaine/",
//     },
//     {
//         "name": "Les jardins de l'abbaye",
//         "lat": "48,63661125",
//         "lng": "-1,510553091",
//         "height": "19",
//         "desc": "Les moines avaient l'habitude de se promener dans les jardins de l'abbaye le matin après leur prière. Les jardins ont aussi servis de potagé où les moines y plantaient des légumes.",
//         "images": ["https://i.imgur.com/Yarx89G.jpg","https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg/682px-Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg",],
//         "link": "",
//     },
//     {
//         "name": "Tour du Nord et les remparts",
//         "lat": "48,63687937",
//         "lng": "-1,510398999",
//         "height": "19",
//         "desc": "La tour du nors est élevée sur un éperon rocheux, est la plus grande tour défensive de l'abbaye. Elle a été construite en 1254 dans le but d'impressioner les attaquants. Depuis la guerre de cent ans, l'abbaye n'a fait que de se fortifier. Les remparts entourant l'abbaye donne sa réputation de forteresse imprenable.",
//         "images": ["https://i.imgur.com/J5Swk7c.jpg","https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://i0.wp.com/www.histoire-normandie.fr/wp-content/uploads/2018/05/laurid-31.jpg?ssl=1"],
//         "link": "https://www.ot-montsaintmichel.com/je-decouvre/visiter-le-mont-saint-michel/je-visite-le-mont-saint-michel/le-village-et-les-remparts/ https://fr.wikipedia.org/wiki/Fortifications_du_Mont-Saint-Michel#Tour_Nord",
//     },
//     {
//         "name": "La flèche et la statue dorée",
//         "lat": "48,63639035",
//         "lng": "-1,511547215",
//         "height": "",
//         "desc": "L’archange Michel était respecté par sa bravoure et son commandement. Une légende raconte qu’il affronta Satan sous forme de dragon au Mont ce qui le rendit inoubliable. De ce fait, lorsqu’une personne voulait se protéger de démons, elle faisait appel à Saint-Michel. Par la suite, l’archange Saint-Michel aurait demandé à l'évêque Aubert, de marquer ce lieu devenu sacré en construisant une église sur ce Mont. C’est ainsi que le Mont-Saint-Michel prit son nom, et qu’il repose tout en haut du Mont, au sommet de la Merveille sous forme d'une statue dorée. ",
//         "images": ["https://i.imgur.com/NPr1Lzb.jpg", "https://i.imgur.com/44g0CZH.jpg"],
//         "link": "https://www.wikimanche.fr/Statue_de_saint_Michel_terrassant_le_dragon",
//     },
//     {
//         "name": "La merveille",
//         "lat": "48,63640318",
//         "lng": "-1,511631965",
//         "height": "19",
//         "desc": "L'église de la Merveille est le bâtiment le plus haut de l'abbaye. Le roi de France, Philippe-Auguste prêta de l’argent à l’abbaye afin de dédommager le monastère du préjudice causé par les Bretons. Cet argent est investi dans la construction de la Merveille en 1204. Le bâtiment mérite bel et bien son nom puisque l’endroit où il est construit n’est pas un endroit propice à la construction, c'est un terrain en pente.",
//         "images": ["https://i.imgur.com/27fyXk9.jpg", "https://i.imgur.com/9ajPNUG.jpg"],
//         "link": "https://www.pariscityvision.com/fr/europe/france/mont-saint-michel/merveille",
//     },
//     {
//         "name": "Cloître de l'abbaye",
//         "lat": "48,63626862",
//         "lng": "-1,511620593",
//         "height": "19",
//         "desc": "Situé au sommet de la Merveille, le cloître de l'abbaye et son jardin entouré de voutes en forme d'un quadrilatère irrégulier, est un symbole religieux très fort puisqu'elle se trouve donc proche des cieux et donc de Dieu. Son rôle est donc symbolique. Le jardin avait pour fonction potager pour les moines et aussi pouvoir s'y promener. Ce lieu est très apprécié par les moines qui s'y promenèrent et se réunnissaient.",
//         "images": ["https://i.imgur.com/sz9svj4.jpg","https://i.imgur.com/vCEwWmG.jpg","https://cdn.pixabay.com/photo/2015/04/15/11/28/mont-saint-michel-723647_1280.jpg", "https://live.staticflickr.com/65535/50273953286_767c02547b_b.jpg"],
//         "link": "https://fr.wikipedia.org/wiki/Abbaye_du_Mont-Saint-Michel#Clo%C3%AEtre_(1225-1228)",
//     }
// ]

// const videos = {
//     "1": [
//         "https://i.imgur.com/DMYmFJD.mp4",
//         "https://i.imgur.com/klAVGkb.mp4",
//         "https://i.imgur.com/uspzUc4.mp4",
//         "https://i.imgur.com/bKLtpUD.mp4",
//         "https://i.imgur.com/olKMSi5.mp4",
//         "https://i.imgur.com/NUAt9mH.mp4",
//         "https://i.imgur.com/3tVqriy.mp4",
//         "https://i.imgur.com/kOgH8r7.mp4",
//         "https://i.imgur.com/fVdPvwJ.mp4",
//         "https://i.imgur.com/nOYoqjh.mp4",
//         "https://i.imgur.com/g9Olyp3.mp4",
//         "https://i.imgur.com/Eip24fK.mp4"
//     ],
//     "-1": [
//         "https://i.imgur.com/Gn0griF.mp4",
//         "https://i.imgur.com/Vag1fWT.mp4",
//         "https://i.imgur.com/UhKH3IO.mp4",
//         "https://i.imgur.com/Q66dDUz.mp4",
//         "https://i.imgur.com/KYdIIwU.mp4",
//         "https://i.imgur.com/vxNqQGo.mp4",
//         "https://i.imgur.com/jJO7ot4.mp4",
//         "https://i.imgur.com/doZrSTd.mp4",
//         "https://i.imgur.com/OXYaMvB.mp4",
//         "https://i.imgur.com/u19lgZU.mp4",
//         "https://i.imgur.com/fbhRXuL.mp4",
//         "https://i.imgur.com/cSMMa6E.mp4"
//     ]
// }

// const video = document.querySelector('.js-video');
// const source = document.querySelector('.js-source');
// const modal = document.querySelector('.vr__modal');
// const loader = document.querySelector('.vr__loader');

// let currentLocation = 0;
// let inAnimation = false;
// let videoLoaded = false;

// const updateModalUI = (locId) => {
//     locId--
//     document.getElementById("js-vr-modal-name").innerText = LOCATIONS[locId].name
//     document.getElementById("js-vr-modal-desc").innerText = LOCATIONS[locId].desc
//     imagesHTML = ""
//     for (let i = 0; i < LOCATIONS[locId].images.length; i++) {
//         imagesHTML += `<img class="vrslider__img" src="${LOCATIONS[locId].images[i]}" alt="${LOCATIONS[locId].name}">`
//     }
//     document.getElementById("js-vr-modal-images").innerHTML = imagesHTML
//     document.getElementById("js-vr-modal-progress").innerText = `${locId + 1}/${LOCATIONS.length}`
// } 

// const switchLocation = async (increment) => {
//     if (inAnimation) return;

//     inAnimation = true;
//     modal.classList.remove('show');
//     const step = currentLocation + increment;
//     window.history.replaceState({}, document.title, `?step=${step}`);

//     currentLocation += increment;

//     if (currentLocation > 0 && currentLocation <= LOCATIONS.length) {
//         updateModalUI(currentLocation);
//     }

//     source.src = videos[increment][currentLocation - Math.max(0, increment)];
//     videoLoaded = false;
//     video.load();
//     video.play();

//     setTimeout(() => {
//         if (!videoLoaded) {
//             loaderFadeIn();
//         }
//     }, 350);
// }

// const getPosterFor = (locId) => {
//     return `https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(${1 + locId * 90}).webp`;
// }

// const loaderFadeIn = () => {
//     loader.classList.add('show');
//     loader.style.display = 'grid';
//     setTimeout(() => {
//         loader.style.display = 'grid';
//     }, 200);
// }

// const loaderFadeOut = () => {
//     loader.classList.remove('show');
//     setTimeout(() => {
//         loader.style.display = 'none';
//     }, 200);
// }

// video.addEventListener('ended', () => {
//     inAnimation = false;
//     source.src = "";
//     video.load(); 

//     if (currentLocation <= LOCATIONS.length) {
//         modal.classList.add('show');
//     }
// }, false);

// video.addEventListener('loadeddata', function() {
//     videoLoaded = true;
//     loaderFadeOut();
//     video.poster = getPosterFor(currentLocation);
// }, false);

// video.addEventListener('waiting', () => {
//     if (videoLoaded) {
//         setTimeout(() => {
//             loaderFadeIn();
//         }, 150);
//     }
// })

// video.addEventListener('playing', () => {
//     loaderFadeOut();
//     setTimeout(() => {
//         loaderFadeOut();
//     }, 150);
// })

// document.addEventListener('keydown', (e) => {
//     if (e.keyCode === 37) {
//         switchLocation(-1);
//     } else if (e.keyCode === 39) {
//         switchLocation(1);
//     }
// });

// document.addEventListener('DOMContentLoaded', () => {
//     // prévenir que la visite consomme beaucoup de données
//     var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
//     const lotOfDataMessage = "Attention, la visite virtuelle peut consommer beaucoup de données, des frais de connexion peuvent s'appliquer. \n\nTaille estimée : 40 Mo. \n\nVoulez-vous continuer ?"

//     if (connection) {
//         if (connection.effectiveType === 'cellular') {
//             if (localStorage.getItem('vr__data_confirmed') != 1 && !confirm(lotOfDataMessage)) {
//                 return history.back();
//             } else {
//                 localStorage.setItem('vr__data_confirmed', 1);
//             }
//         }
//     }

//     const urlParams = new URLSearchParams(window.location.search);
//     var step = urlParams.get('step') || 1;

//     if (step < 1 || step > LOCATIONS.length) {
//         step = 1;
//     }

//     currentLocation = parseInt(step) - 1;
//     video.poster = getPosterFor(currentLocation);
//     switchLocation(1);
//     updateModalUI(currentLocation);
//     modal.classList.add('show');
// });