<footer class="container footer">
        <p>Faqja e punuar nga studentet e shkolles <strong>TICK Education Center </strong></p>.
    </footer>
    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("submitted!");
        //     }
        // });
    
        $().ready(function() {
            $("#login").validate({
                rules: { 
                    email: {
                        required: true,
                        email: true
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    
                    fjalekalimi: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: {
                        required:"Please provide a email",
                        email:"Please enter a valid email address"     
                    }          
                }
            });
            $("#anetari").validate({
                rules: { 
                    emri: {
                        required: true,
                        minlength: 3,
                        number:true

                    },
                    mbiemri: {
                        required: true,
                        number:true
                    },
                    telefoni: {
                        required: true
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    
                    emri: {
                        required: "Te lutem shenoni emrin",
                        minlength: "Emri duhet te kete me shume se 5 karaktere",
                        number: "Emri nuk duhet te kete numra"
                    },
                    mbiemri: {
                        required: "Te lutem shenoni mbiemrin",
                        number: "Mbiemri nuk duhet te kete numra"
                    },
                    telefoni: {
                        required: "Te lutem shenoni telefonin"
                    },
                    email: {
                        required:"Te lutem shenoni emailin",
                        email:"Ju lutem shenoni email address valide"     
                    },
                    fjalekalimi: {
                        required:"Te lutem shenoni fjalekalimin",
                        minlength:"Fjalekalimi duhet te kete me shume se 6 karaktere"     
                    }

                }
            });
        });
        </script>
    <script type="text/javascript">
        $('.slider').slick({
              dots: true,
            // infinite: false,
            //  speed: 300,
             nextArrow: false,
             prevArrow: false,
             slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $("#mesazhi").fadeOut(8000);
    </script>
</body>

</html>