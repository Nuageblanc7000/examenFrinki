//création du slider de zéro made in rw

const sliderContainer = document.querySelector(".slider-container");
const sliders = sliderContainer.querySelectorAll(".slider");
const nexts = sliderContainer.querySelector(".next");
const prevs = sliderContainer.querySelector(".prev");
const SliderMiniContainer = document.querySelector('.slider-mini-container')
const slidersMini = SliderMiniContainer.querySelectorAll('.slider-mini')

console.log()
let n = 0;

const prev = () => {
  slider( n += 1);
};
const next = () => {
  slider(n -= 1);

};

const slider = () => {
    console.log(n,'slider')
    sliders.forEach((value,key) =>{
        value.classList.remove("active")
        slidersMini.item(key).classList.remove("activeMini")
    })

    if (n > sliders.length - 1) n = 0;

    if (n < 0) n = sliders.length -1 ;
    
    slidersMini.item(n).classList.add("activeMini")
    sliders.item(n).classList.add("active");
};
let interval = setInterval(console.log('test'),1000);

slidersMini.forEach(element => {
    element.addEventListener('click',()=>{
        n = parseInt(element.dataset.number)
        slider(n)
        console.log(n)
       
    })
});
nexts.addEventListener("click", next);
prevs.addEventListener("click", prev);
