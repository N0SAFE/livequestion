function link1(result) {
    if (result == "1"){
        document.querySelector("#firstlink").classList.remove("display-none");
        document.querySelector("#secondlink").classList.add("display-none");
        document.querySelector("#thirdlink").classList.add("display-none");
        document.querySelector("#firstButton").classList.add("cadre");
        document.querySelector("#secondButton").classList.remove("cadre");
        document.querySelector("#thirdButton").classList.remove("cadre");
    }
    if (result == "2"){
        document.querySelector("#firstlink").classList.add("display-none");
        document.querySelector("#secondlink").classList.remove("display-none");
        document.querySelector("#thirdlink").classList.add("display-none");
        document.querySelector("#firstButton").classList.remove("cadre");
        document.querySelector("#secondButton").classList.add("cadre");
        document.querySelector("#thirdButton").classList.remove("cadre");
    }
    if (result == "3"){
        document.querySelector("#firstlink").classList.add("display-none");
        document.querySelector("#secondlink").classList.add("display-none");
        document.querySelector("#thirdlink").classList.remove("display-none");
        document.querySelector("#firstButton").classList.remove("cadre");
        document.querySelector("#secondButton").classList.remove("cadre");
        document.querySelector("#thirdButton").classList.add("cadre");
    }
}
