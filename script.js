var form = $( "#form" );
form.validate({
    email: {
        required: true,
        email: true,
        regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    }
});

$.validator.addMethod(
    /* The value you can use inside the email object in the validator. */
    "regex",

    /* The function that tests a given string against a given regEx. */
    function(value, element, regexp)  {
        /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/

        if (regexp && regexp.constructor != RegExp) {
           /* Create a new regular expression using the regex argument. */
           regexp = new RegExp(regexp);
        }

        /* Check whether the argument is global and, if so set its last index to 0. */
        else if (regexp.global) regexp.lastIndex = 0;

        /* Return whether the element is optional or the result of the validation. */
        return this.optional(element) || regexp.test(value);
    }
);


$("#form").submit(function (e) {    
    e.preventDefault();
    post();
   
   
});

$("#limpar").click(function (e) { 
    e.preventDefault();

  
    deletar();
    
    get()
});

function deletar(){
    $.ajax({
        type: "DELETE",
        url: "http://localhost/ListaPHP/connection.php",
        success: function(response){
            
            $("#salvo").html(response) 
            
            $('#exampleModal').modal('show');
        

        },
        dataType:"json"


    });
}

function post(){
    form.validate({
        email: {
            required: true,
            email: true,
            regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        }
    });
            if(form.valid()==true){
                var u_nome = $('#nome').val();
                var u_email = $('#email').val();
                var u_cpf = $('#cpf').val();
                var cpf = CryptoJS.AES.encrypt(u_cpf,"123")
        
                console.log(cpf.toString())
        
                $.ajax({
                    type: "POST",
                    url: "http://localhost/ListaPHP/connection.php",
                    data: {nome:u_nome, email:u_email, cpf:cpf.toString()},
                    success: function(response){
                        console.log(response)
                        if(response!="salvo"){
                            $("#salvo").html(response) 
                                  
                        }else{
                            get();
                            $("#salvo").html("salvo com sucesso")
                            document.getElementById("nome").value="";
                            document.getElementById("cpf").value="";
                            document.getElementById("email").value="";
                            
                        }
                        $('#exampleModal').modal('show');
                        
                    },
                    dataType: "json"
                   
                });
            }
            
        }

        
        function get(){
            
            $.get("http://localhost/ListaPHP/connection.php", function (data) {
                var resultado = JSON.parse(data);
                $(".list").html("<thead class='table-dark'><tr><td>Nome</td><td>Email</td><td>CPF</td></tr> </thead>");
                console.log(resultado);
        
                for (var i = 0; i < resultado.length; i++) {
                    
                    var decrypted = CryptoJS.AES.decrypt(resultado[i].cpf, "123");
        
        
                        $(".list").append("<tr><td>" + resultado[i].nome + "<td>" + resultado[i].email + "</td>"+"<td>" + decrypted.toString(CryptoJS.enc.Utf8) +"</td></tr>");
                   
                }
            });
        }


get();



