let breakingImg = document.querySelector('#breakingImg');
let breakingNews_title = document.querySelector('#breakingNews. title')
let breakingNews_desc = document.querySelector('#breakingNews. description');
let topNews = document.querySelector('.topNews');
let sportsNews = document.querySelector('#sportsNews .newsBox');
let businessNews = document.querySelector('#businessNews .newsBox')
let techNews = document.querySelector('#techNews. newsBox')

let header = document.querySelector('.header')
let toggleMenu = document.querySelector('.bar')
let menu = document.querySelector('nav ul')

const toggle = (e)=>{
    toggleMenu.classList.toggle('active')
    menu.classList.toggle('activeMenu')
}

toggleMenu.addEventListener('click',toggle)

window.addEventListener('scroll',()=>{
    if(window.scroll>50){
        header.classList.add('sticky')
    }
    else{
        header.classList.remove('sticky')
    }
}


//fetching news from website api

const apikey = "0a2378092b2740c498334a128df5dfa3";

function fetchData2(category, pageSize) {
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET", `https://newsapi.org/v2/top-headlines?category=${category}
	&pageSize=${pageSize}&apiKey=${apikey}`, false);
	xmlHttp.send();
	var dataArr = JSON.parse(xmlHttp.responseText);
	console.log(dataArr);
	return dataArr["articles"]; //
}

test2 = fetchData2('general', 20);
console.log(test2);

//adding breaking News 

const add_breakingNews = (data)=>{
    breakingImg.innerHTML = '<img src=${data[0].urlToImage} alt="image">';
    breakingNews_title.innerHTML = '<a href=${data[0].url}target= "_blank"><h2>${data[0].title}</h2></a>';
    breakingNews_desc.innerHTML = '${data[0].description}';
}
fetchData('general',5).then(add_breakingNews);

const add_topNews = (data)=>{
    let html = ''
    let title =''
    data.forEach((element)=>{
        if (element.title.length<100){
            title = element.title
        }
        else{
            title = element.title.slice(0,100)+"..."
        }
        html += `<div class="news">
                    <div class="img">
                        <img src=${element.urlToImage} alt="image">
                    </div>
                    <div class="text">
                        <div class="title">
                        <a href=${element.url} target="_blank"><p>${title}</p></a>
                        </div>
                    </div>
                </div>`
    })
    topNews.innerHTML = html
}
fetchData('general',20).then(add_topNews)

const add_sportsNews = (data)=>{
    let html = ''
    let title = ''
    data.forEach((element)=>{
        if (element.title.length<100){
            title = element.title
        }
        else{
            title = element.title.slice(0,100)+"..."
        }
        html += `<div class="newsCard">
                    <div class="img">
                        <img src=${element.urlToImage} alt="image">
                    </div>
                    <div class="text">
                        <div class="title">
                        <a href=${element.url} target="_blank"><p>${title}</p></a>
                        </div>
                    </div>
                </div>`
    })
    sportsNews.innerHTML = html
}
fetchData('sports',5).then(add_sportsNews)

const add_businessNews = (data)=>{
    let html = ''
    let title = ''
    data.forEach((element)=>{
        if (element.title.length<100){
            title = element.title
        }
        else{
            title = element.title.slice(0,100) + "..."
        }

        html += `<div class="newsCard">
                    <div class="img">
                        <img src=${element.urlToImage} alt="image">
                    </div>
                    <div class="text">
                        <div class="title">
                        <a href=${element.url} target="_blank"><p>${title}</p></a>
                        </div>
                    </div>
                </div>`
    })
    businessNews.innerHTML = html
}
fetchData('business',5).then(add_businessNews)

const add_techNews = (data)=>{
    let html = ''
    let title = ''
    data.forEach((element)=>{
        if (element.title.length<100){
            title = element.title
        }
        else{
            title = element.title.slice(0,100) + "..."
        }

        html += `<div class="newsCard">
                    <div class="img">
                        <img src=${element.urlToImage} alt="image">
                    </div>
                    <div class="text">
                        <div class="title">
                        <a href=${element.url} target="_blank"><p>${title}</p></a>
                        </div>
                    </div>
                </div>`;
    })
    techNews.innerHTML = html;
}
fetchData('technology',5).then(add_techNews)