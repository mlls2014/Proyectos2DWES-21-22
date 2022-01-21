// ¡¡Ojo!! Esto debe cambiarse cuando se instale la app
var url = 'http://localhost/source/Eva2/instagram-laravel/public';

window.addEventListener("load", function () {

   $('.btn-like').css('cursor', 'pointer');
   $('.btn-dislike').css('cursor', 'pointer');

   function dislike() {
      $('.btn-dislike').off('click').on('click', function () {
         $(this).addClass('btn-like').removeClass('btn-dislike');
         // Recupero texto de likes
         var likes = $(this).next('.likes').text();
         // Recupero el número de likes
         var regex = /(-?\d+)/g;
         var num = Number(likes.match(regex)) - 1;
         $(this).next('.likes').text('Likes (' + num + ')');
         console.log('dislike');
         $.ajax({
            url: url + '/likes/delete/' + $(this).data('id'),
            type: 'GET',
            success: function (result) {
               if (result.like) {
                  console.log('Has dado dislike a la publicación');
               } else {
                  console.log('Error al dar dislike');
               }
            }
         });
         like();
      })
   }
   like();

   function like() {
      $('.btn-like').off('click').on('click', function () {
         $(this).addClass('btn-dislike').removeClass('btn-like');
         // Recupero texto de likes
         var likes = $(this).next('.likes').text();
         // Recupero el número de likes
         var regex = /(-?\d+)/g;
         var num = Number(likes.match(regex)) + 1;

         $(this).next('.likes').text('Likes (' + num + ')');
         console.log('like');
         $.ajax({
            url: url + '/likes/' + $(this).data('id'),
            type: 'GET',
            success: function (result) {
               if (result.like) {
                  console.log('Has dado like a la publicación');
               } else {
                  console.log('Error al dar like');
               }
            }

         });
         dislike();
      })
   }
   dislike();

});