//Odpowiada za automatyczne ustawienie roku
let year = document.getElementById("stopka");
year.innerHTML = new Date().getFullYear();

//Odpowiada za ustawienie stylów górnego opaska
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

const company = new companyData("Samochody Polskie", "Samochodzik","1234567", "Podkarpacka", "35-084", "Rzeszów", "Polska");
document.getElementById("ad").innerHTML = company.writeName() + "<br/>" + company.writeAddress();

//Zmiana koloru przy przesunięciu kursora na nazwę
function zmien_kolor(object,color) {
var element = document.getElementById(object);
element.style.color = color;
}