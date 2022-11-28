let breakingImg = document.querySelector('#breakingImg');
let breakingNews_title = document.querySelector('#breakingNews. title');
let breakingNews_desc = document.querySelector('#breakingNews. description');
let topNews = document.querySelector('.topNews');

//fetching news from website api

const apiKey = "0a2378092b2740c498334a128df5dfa3";

const fetchData = async (category,pageSize)=>{
    const url = 'https://newsapi.org/v2/top-headlines?country=us&category=${category}&pageSize=${pageSize}&apiKey=${apiKey}';
    
    const data = await fetch(url);
    const response = await data.json();
    console.log(response);
    return response.articles;
}

//fetchData('general', 5);

//adding breaking News 

const add_breakingNews = (data)=>{
    breakingImg.innerHTML = '<img src=${data[0].urlToImage} alt="image">';
    breakingNews_title.innerHTML = '<a href=${data[0].url}target= "_blank"><h2>${data[0].title}</h2></a>';
    breakingNews_desc.innerHTML = '${data[0].description}';
}

fetchData('general',5).then(add_breakingNews);