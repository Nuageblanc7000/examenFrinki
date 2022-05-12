import './styles/home.scss';


//création du toggle pour le menu burger

const header = document.querySelector('header')
const openBurger = header.querySelector('.nav-main .burger')
const navChild = header.querySelector('.nav-child')
const closeBurger = navChild.querySelector('.close') 

// on va pouvoir créer un style différent selon l'état du scroll
// const headerSticky = ()=>{
//    if(scrollY == 0){
//        header.style.position="sticky"
//    }else{
//     header.style.position="fixed"
//    }
// }

//event
openBurger.addEventListener('click', ()=> { navChild.classList.toggle('open') })
closeBurger.addEventListener('click', ()=> { navChild.classList.toggle('open') })

// window.addEventListener('scroll',headerSticky)





