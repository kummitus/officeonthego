$(function() {

  var t = {
    "Home": {
      fi: "Etusivu"
    },
    "Places": {
      fi: "Kohteet"
    },
    "Tasks": {
      fi: "Tehtävät"
    },
    "Times": {
      fi: "Tunnit"
    },
    "Bills": {
      fi: "Laskut"
    },
    "Managers": {
      fi: "Isännöitsijät"
    },
    "Users": {
      fi: "Käyttäjät"
    },
    "Groups": {
      fi: "Ryhmät"
    },
    "Log Out": {
      fi: "Kirjaudu ulos"
    },
    "Submit hours for current task": {
      fi: "Ilmoita tunnit"
    },
    "Present": {
      fi: "Läsnä"
    },
    "Date": {
      fi: "Päivämäärä"
    },
    "Start time": {
      fi: "Aloitusaika"
    },
    "End time": {
      fi: "Lopetusaika"
    },
    "Add": {
      fi: "Lisää"
    },
    "Log In": {
      fi: "Kirjaudu sisään"
    },
    "Username": {
      fi: "Käyttäjänimi"
    },
    "Password": {
      fi: "Salasana"
    },
    "Login": {
      fi: "Kirjaudu"
    },
    "Admin": {
      fi: "Ylläpitäjä"
    },
    "show": {
      fi: "Näytä"
    },
    "See user": {
      fi: "Katso käyttäjä"
    },
    "yes": {
      fi: "Kyllä"
    },
    "no": {
      fi: "Ei"
    },
    "Create user": {
      fi: "Luo käyttäjä"
    },
    "Delete": {
      fi: "Poista"
    },
    "Update": {
      fi: "Muokkaa"
    },
    "Toggle admin": {
      fi: "Aseta ylläpitäjäksi"
    },
    "Name": {
      fi: "Nimi"
    },
    "Active groups": {
      fi: "Aktiiviset ryhmät"
    },
    "Retired groups": {
      fi: "Menneet ryhmät"
    },
    "Create group": {
      fi: "Luo ryhmä"
    },
    "Status": {
      fi: "Asema"
    },
    "Teamleader": {
      fi: "Ryhmänvetäjä"
    },
    "Member": {
      fi: "Jäsen"
    },
    "Location": {
      fi: "Kohde"
    },
    "Show task": {
      fi: "Näytä tehtävä"
    },
    "Remove member": {
      fi: "Poista jäsen"
    },
    "Delete": {
      fi: "Poista"
    },
    "Add member": {
      fi: "Lisää jäsen"
    },
    "All Places": {
      fi: "Kaikki kohteet"
    },
    "Address": {
      fi: "Osoite"
    },
    "City": {
      fi: "Kaupunki"
    },
    "Maintenance": {
      fi: "Huoltoyhtiö"
    },
    "Billing code": {
      fi: "Laskutusnumero"
    },
    "Manager": {
      fi: "Isännöitsijä"
    },
    "See Place": {
      fi: "Katso kohde"
    },
    "Create Place": {
      fi: "Luo kohde"
    },
    "Active Tasks": {
      fi: "Aktiiviset tehtävät"
    },
    "Retired tasks": {
      fi: "Tehdyt tehtävät"
    },
    "Group": {
      fi: "Ryhmä"
    },
    "Time spent": {
      fi: "Aikaa käytetty"
    },
    "hours": {
      fi: "tuntia"
    },
    "Toggle Activity": {
      fi: "Muuta tila"
    },
    "Create task": {
      fi: "Luo tehtävä"
    },
    "See task": {
      fi: "Katso"
    },
    "Hours": {
      fi: "Tuntia"
    },
    "Task name and location": {
      fi: "Tehtävän nimi ja osoite"
    },
    "See time": {
      fi: "Katso"
    },
    "Create time": {
      fi: "Ilmoita tunteja"
    },
    "Company": {
      fi: "Yritys"
    },
    "Sum": {
      fi: "Summa"
    },
    "Info": {
      fi: "Info"
    },
    "Date": {
      fi: "Päivämäärä"
    },
    "See bill": {
      fi: "Katso"
    },
    "Create bill": {
      fi: "Luo lasku"
    },
    "Phone": {
      fi: "Puhelinnumero"
    },
    "Email": {
      fi: "Email"
    },
    "See manager": {
      fi: "Katso"
    },
    "Create Manager": {
      fi: "Luo isännöitsijä"
    },
    "Task": {
      fi: "Tehtävä"
    },
    "Browse": {
      fi: "Hae kuvat"
    },
    "Drop Here": {
      fi: "Raahaa tänne"
    },
    "Back": {
      fi: "Takaisin"
    },
    "Choose image": {
      fi: "Valitse kuva"
    },
    "See group": {
      fi: "Katso"
    },
    "Remove member": {
      fi: "Poista ryhmästä"
    },
    "Active": {
      fi: "Aktiivinen"
    },
    "Submit": {
      fi: "Lähetä"
    },
    "All Places": {
      fi: "Kaikki kohteet"
    },
    "Select pictures": {
      fi: "Valitse kuvat"
    },
    "Comment": {
      fi: "Kommentti"
    },
    "Title": {
      fi: "Nimi"
    },
    "Information": {
      fi: "Ohjeet"
    },
    "Remove picture": {
      fi: "Poista kuva"
    },
    "Add image": {
      fi: "Lisää kuva"
    },
    "Search": {
      fi: "Hae"
    }

  };
var translator = $('body').translate({lang: "fi", t: t});
var str = translator.g("translate");
console.log(str);


$(".lang_selector").click(function(ev) {
  var lang = $(this).attr("data-value");
  translator.lang(lang);

  console.log(lang);
  ev.preventDefault();
});

});
