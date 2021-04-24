require('./bootstrap');

$('.user-link').on('click', function(e){
    // Almacenamos la visita de forma asincrónica sin interrumpir la apertura del enlace

    var linkId = $(this).data('link-id');
    var linkUrl = $(this).attr('href');

    axios.post('/visit/' + linkId, {
        link: linkUrl
    })
    .then(response => console.log('response: ', response))
    .catch(error => console.error('error: ', error));
});