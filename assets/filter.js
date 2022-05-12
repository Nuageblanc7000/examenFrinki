

//création du mécanisme du filtre show /down
const filter = document.querySelector('.filterAd')
const btnFilter = document.querySelector('.btnFilter')

btnFilter.addEventListener('click',()=> filter.classList.toggle('showFilter'))