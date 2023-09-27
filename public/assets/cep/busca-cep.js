

    // SEARCH ZIPCODE
    $('.zip_code_search').blur(function () {

        function emptyForm() {
            $(".street").val("");
            $(".district").val("");
            $(".city").val("");
            $(".state").val("");
        }

        var zip_code = $(this).val().replace(/\D/g, '');
        var validate_zip_code = /^[0-9]{8}$/;

        if (zip_code != "" && validate_zip_code.test(zip_code)) {

            $(".street").val("");
            $(".district").val("");
            $(".pais").val("");
            $(".city").val("");
            $(".state").val("");

            $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {

                if (!("erro" in data)) {
                    $(".street").val(data.logradouro);
                    $(".district").val(data.bairro);
                    $(".city").val(data.localidade);
                    $(".pais").val('Brasil');
                    $(".state").val(data.uf);
                } else {
                    emptyForm();
                    console.log("CEP não encontrado.");
                }
            });
        } else {
            emptyForm();
            console.log("Formato de CEP inválido.");
        }
    });
