      $(document).ready(function(){

        $("#tabel").css('opacity', '0.5');

        $("#pass").hide();

        var date = $("#date").val();



        var countChecked = function(){

         var n =  $('.hadir:radio:checked').length;

         var m = $('.alpha:radio:checked').length;

        

        $("#hadir").text(n);

          $("#alpha").text(m);

          };



          countChecked();

          $("input[type=radio]").on("click", countChecked);



         $("#date").click(function(){

            $("#tabel").css('opacity', '1.0');

            $("#kirim, input[type='radio']").removeAttr('disabled');

            $("#tgl").fadeOut()

         });

         

         $("#admin").click(function(){

             $("#pass").slideToggle();

         })

      });
