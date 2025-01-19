const maxSelections = 5;

const checkboxesPlataforma = document.querySelectorAll('.checkbox-plataformas');

const checkboxesGeneros = document.querySelectorAll('.checkbox-generos');

checkboxesPlataforma.forEach(checkboxesPlataforma => {
    checkboxesPlataforma.addEventListener('change', () => {
    const selected = document.querySelectorAll('.checkbox-plataformas:checked').length;

    if (selected > maxSelections) {
        checkboxesPlataforma.checked = false;
        alert(`Você pode selecionar no máximo ${maxSelections} plataformas.`);
    }
    });
});

checkboxesGeneros.forEach(checkboxesGeneros => {
    checkboxesGeneros.addEventListener('change', () => {
    const selected = document.querySelectorAll('.checkbox-generos:checked').length;

    if (selected > maxSelections) {
        checkboxesGeneros.checked = false;
        alert(`Você pode selecionar no máximo ${maxSelections} generos.`);
    }
    });
});