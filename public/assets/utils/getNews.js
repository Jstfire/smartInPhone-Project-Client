function getNews(numbCar, URLNews, newsSource) {
    var XMLResult;
    xhttp = new XMLHttpRequest();
    var url = URLNews;
    xhttp.open("GET",url,false);
    xhttp.send();
    XMLResult = xhttp.responseXML.getElementsByTagName("item");
    console.log("OK");
    console.log(XMLResult);
    let carouselNews = document.createElement("div");
    carouselNews.setAttribute("id", numbCar);
    carouselNews.setAttribute("class","carousel slide");
    carouselNews.setAttribute("data-bs-ride","carousel");

    let carouselIndicators = document.createElement("div");
    carouselIndicators.setAttribute("class", "carousel-indicators");
    let carouselInner = document.createElement("div");
    carouselInner.setAttribute("class", "carousel-inner");


    let channel = document.createElement("h1");
    // channel.innerHTML = newsSource;

    for (let i = 0; i < 5; i++) {
        let buttonNews = document.createElement("button");
        buttonNews.setAttribute("type", "button");
        buttonNews.setAttribute("data-bs-target", numbCar);
        buttonNews.setAttribute("data-bs-slide-to", i);
        buttonNews.setAttribute("aria-label", "Slide "+ (i+1));

        if (i == 0) {
            buttonNews.setAttribute("class", "active");
            buttonNews.setAttribute("aria-current", "true");
        }
        
        carouselIndicators.appendChild(buttonNews);

        let carouselItem = document.createElement("div");
        if (i == 0) {
            carouselItem.setAttribute("class", "carousel-item active");
        } else {
            carouselItem.setAttribute("class", "carousel-item");
        }
        
        let mainTXT = document.createElement("div");
        mainTXT.setAttribute("class", "maintxt");
        let childTXT = document.createElement("div");
        childTXT.setAttribute("class", "childtxt");
        mainTXT.appendChild(childTXT);
        carouselItem.appendChild(mainTXT);

        if (newsSource == "Okezone") {
            let link = document.createElement("a");
            let img = document.createElement("img");
            let desc = document.createElement("p");
            let pubDate = document.createElement("p");

            link.setAttribute("href", XMLResult[i].getElementsByTagName("link")[0].innerHTML);
            link.appendChild(XMLResult[i].getElementsByTagName("title")[0]);
            img.setAttribute("src", XMLResult[i].getElementsByTagName("media:content")[0].getAttribute("url"));
            desc.appendChild(XMLResult[i].getElementsByTagName("description")[0]);
            pubDate.appendChild(XMLResult[i].getElementsByTagName("pubDate")[0]);
            childTXT.appendChild(link);
            childTXT.appendChild(pubDate);
            mainTXT.appendChild(img);
            childTXT.appendChild(desc);
        } else {
            let link = document.createElement("a");
            let img = document.createElement("img");
            let desc = document.createElement("p");
            let pubDate = document.createElement("p");

            link.setAttribute("href", XMLResult[i].getElementsByTagName("link")[0].innerHTML);
            link.appendChild(XMLResult[i].getElementsByTagName("title")[0]);
            img.setAttribute("src", XMLResult[i].getElementsByTagName("enclosure")[0].getAttribute("url"));
            desc.appendChild(XMLResult[i].getElementsByTagName("content:encoded")[0]);
            pubDate.appendChild(XMLResult[i].getElementsByTagName("pubDate")[0]);
            childTXT.appendChild(link);
            childTXT.appendChild(pubDate);
            mainTXT.appendChild(img);
            childTXT.appendChild(desc);
        }
        carouselInner.appendChild(carouselItem);
    }
    carouselNews.appendChild(carouselIndicators);
    carouselNews.appendChild(carouselInner);

    let buttonPrev = document.createElement("button");
    buttonPrev.setAttribute("type", "button");
    buttonPrev.setAttribute("class", "carousel-control-prev");
    buttonPrev.setAttribute("data-bs-target", "#" + numbCar);
    buttonPrev.setAttribute("data-bs-slide", "prev");
    let span1 = document.createElement("span");
    span1.setAttribute("class", "carousel-control-prev-icon");
    span1.setAttribute("aria-hidden","true");
    let span2 = document.createElement("span");
    span2.setAttribute("class","visually-hidden");
    span2.innerHTML = "Previous";
    buttonPrev.appendChild(span1);
    buttonPrev.appendChild(span2);
    carouselNews.appendChild(buttonPrev);

    let buttonNext = document.createElement("button");
    buttonNext.setAttribute("type", "button");
    buttonNext.setAttribute("class", "carousel-control-next");
    buttonNext.setAttribute("data-bs-target", "#" + numbCar);
    buttonNext.setAttribute("data-bs-slide", "next");
    let span3 = document.createElement("span");
    span3.setAttribute("class", "carousel-control-next-icon");
    span3.setAttribute("aria-hidden","true");
    let span4 = document.createElement("span");
    span4.setAttribute("class","visually-hidden");
    span4.innerHTML = "Next";
    buttonNext.appendChild(span3);
    buttonNext.appendChild(span4);
    carouselNews.appendChild(buttonNext);

    document.getElementById("root").appendChild(channel);
    document.getElementById("root").appendChild(carouselNews);
}