let current = "";
let pType = "";
let pType2 = "";
let pColor = "";
let pColor2 = "";
let pSpecies = "";
let pWeight = "";
let typePref = "Type Preference: ";
let colorPref = "Color Preference: ";
let weightPref = "Weight Preference: ";
let speciesPref = "Species Preference: ";



function toggleType(att) {
    let hide = "hide" + att;
    let select = "select" + att;
    if (document.getElementById(hide).checked) {
        document.getElementById(select).style.display = "block";
    } else {
        document.getElementById(select).style.display = "none";
    }
}

function removeBracket(qString) {
    switch (qString) {
        case "ptype":
            pType = pType.replace(')', '');
            break;
        case "pcolor":
            pColor = pColor.replace(')', '');
            break;
        case "pspecies":
            pSpecies = pSpecies.replace(')', '');
            break;
    }
}

function buildQuery(data, info) {
    if (!document.getElementById(data).checked) {
        switch (info) {
            case 'ptype':
                pType = pType.replace(data, '');
                current = pType;
                break;
            case 'pcolor':
                pColor = pColor.replace(data, '');
                current = pColor;
                break;
            case 'pspecies':
                pSpecies = pSpecies.replace(data, '');
                current = pSpecies;
                break;
            case 'pweight':
                pWeight = pWeight.replace(data, '');
                current = pWeight;
                break;
        }
        document.getElementById(info).innerHTML = current;

    } else if (document.getElementById(data).checked) {
        switch (info) {
            case 'ptype':
                removeBracket(info);
                pType += addComma(pType) + data;
                current = pType;
                break;
            case 'pcolor':
                removeBracket(info);
                pColor += addComma(pColor) + data;
                current = pColor;
                break;
            case 'pspecies':
                removeBracket(info);
                pSpecies += addComma(pSpecies) + data;
                current = pSpecies;
                break;
            case 'pweight':
                //removeBracket(info);
                pWeight += addComma(pWeight) + data;
                current = pWeight;
                break;
            default:
                break;
        }
        document.getElementById(info).innerHTML = current;
    }

}

function addComma(att) {
    if (att !== "(") {
        return " ";
    }
    return "";
}

function hideElements() {
    document.getElementById('selectType').style.display = "none";
    document.getElementById('selectColor').style.display = "none";
    document.getElementById('selectSpecies').style.display = "none";
    document.getElementById('selectWeight').style.display = "none";
}