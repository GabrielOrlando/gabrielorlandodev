$(document).ready( () => {
    events();
});

function events(){
    $('#btn_verMaisExp').on('click', () => {
        $('#section_todasExperiencias').show();
        $('#btn_verMenosExp').show();
        $('#btn_verMaisExp').hide();
    })

    $('#btn_verMenosExp').on('click', () => {
        $('#section_todasExperiencias').hide();
        $('#btn_verMaisExp').show();
        $('#btn_verMenosExp').hide();
    })
}