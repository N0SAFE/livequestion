window.onload = link1

function link1() {
    document.querySelector("#firstlink").classList.remove("display-none");
    document.querySelector("#secondlink").classList.add("display-none");
    document.querySelector("#thirdlink").classList.add("display-none");
    document.querySelector("#firstButton").classList.add("cadre");
    document.querySelector("#secondButton").classList.remove("cadre");
    document.querySelector("#thirdButton").classList.remove("cadre");
}

function link2() {
    document.querySelector("#firstlink").classList.add("display-none");
    document.querySelector("#secondlink").classList.remove("display-none");
    document.querySelector("#thirdlink").classList.add("display-none");
    document.querySelector("#firstButton").classList.remove("cadre");
    document.querySelector("#secondButton").classList.add("cadre");
    document.querySelector("#thirdButton").classList.remove("cadre");
}

function link3() {
    document.querySelector("#firstlink").classList.add("display-none");
    document.querySelector("#secondlink").classList.add("display-none");
    document.querySelector("#thirdlink").classList.remove("display-none");
    document.querySelector("#firstButton").classList.remove("cadre");
    document.querySelector("#secondButton").classList.remove("cadre");
    document.querySelector("#thirdButton").classList.add("cadre");
}