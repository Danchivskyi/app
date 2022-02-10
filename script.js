const loadXMLFile = (file, callback) => {
  const req = new XMLHttpRequest()
  req.onreadystatechange = () => req.readyState === 4 && req.status === 200 && callback(req.responseXML)
  req.open('GET', file, true)
  req.send()
 }

const languages = [['pl', 'Polski'], ['en', 'English'], ['ua', 'Українська']]

const loadMenu = (lang) => {
  loadXMLFile(`data/menu-${lang}.xml`, (xml) => {
    displayMenu(xml)
    menuLanguageSelection(xml)
  })
}

const displayMenu = (xml) => {
  const items = [...xml.getElementsByTagName('item')]

  const list = items.map(({ children }) => {
    const [name, link, submenu] = [...children].map((e) => e.childNodes)
    if (!submenu) return `<li><a href="${link[0].nodeValue}">${name[0].nodeValue}</a></li>`

    const menu = [...submenu].filter(({ nodeName }) => nodeName === 'subitem')
    const sublist = menu.map(({ children }) => {
      const [name, link] = [...children].map((e) => e.childNodes)
      return `<li><a href="${link[0].nodeValue}">${name[0].nodeValue}</a></li>`
    }).join('')

    return `<li><a href="${link[0].nodeValue}">${name[0].nodeValue}</a><div class="sub-menu"><ul>${sublist}</ul></div></li>`
  }).join('')

  document.querySelector('.menu').innerHTML = `<ul>${list}</ul>`
}

const menuLanguageSelection = (xml) => {
  const first = xml.querySelector('language').childNodes[0].nodeValue

  const list = languages.map(([short, full]) => `<option value="${short}"${full === first ? ' selected' : ''}>${full}</option>`).join('')
  document.querySelector('.language').innerHTML = `<select class="lang-select">${list}</select>`

  document.querySelector('.lang-select').addEventListener('change', () => {
    const pick = document.querySelector('.lang-select').value
    const [short, full] = languages.find(([short]) => short === pick)

    const el = document.getElementById('strona-glowna')
    if (el) el.innerHTML = `Wybrano język: ${full}`
    loadMenu(short)
    localStorage.setItem('lang', short)
  })
}

//
//Odpowiada za automatyczne ustawienie roku (działa w tym przypadku, gdy nie ma menu xml)
let year = document.getElementById("stopka");
year.innerHTML = new Date().getFullYear();

//Odpowiada za ustawienie stylów górnego opaska (czyli opaska z nazwa logo
let logo = document.getElementById("logo");
logo.style.fontSize = "1.7rem";
logo.style.fontWeight = "900";
logo.style.color = "#FF0000";

//Konstruktor
class companyData{
constructor(name, fullName, street, postCode, city, country){
    this.name=name;
    this.fullName = fullName;
    this.street = street;
    this.postCode = postCode;
    this.city = city;
    this.country = country;
}

 writeName(){
 return this.name;
 }

 writeFullName(){
 return this.fullName;
 }

 writeAddress(){
 return this.street + "<br/>" + this.postCode + "<br/>" + this.city + "<br/>" + this.country;
 }
}

//
const company = new companyData("Samochody Polskie", "Samochodzik","1234567", "Podkarpacka", "35-084", "Rzeszów", "Polska");
document.getElementById("ad").innerHTML = company.writeName() + "<br/>" + company.writeAddress();

//Zmiana koloru przy przesunięciu kursora na nazwę
function zmien_kolor(object,color) {
var element = document.getElementById(object);
element.style.color = color;
}