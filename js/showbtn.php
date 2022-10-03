
<script type="text/javascript">
var btn = document.querySelector('#show_or_hide');
var container = document.querySelector('.container-formulario');

    btn.addEventListener('click', function() {
        
        if (container.style.display === "block") {
            container.style.display = "none";
            }else{
                container.style.display = "block"; 
            }

    }); 


    $('.<?= $_SESSION['n'];?>-pergunta').on('change', function(){
        $('.<?= $_SESSION['n'];?>-pergunta').not(this).prop('checked',false);
    });


    </script>

// $('.primeira-pergunta').on('change', function(){
//     $('.primeira-pergunta').not(this).prop('checked',false);
// });

