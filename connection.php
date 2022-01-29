<?php

    
    
        try {
            $pdo = new PDO("mysql:dbname=listadb;host=localhost","root","");
            
        } catch (PDOException $e ) {
            $res = "Erro com banco de dados: ".$e->getMessage();
        }catch (Exception $e ) {
            $res = "Erro generico: ".$e->getMessage();
        }
    
        
        if($_SERVER['REQUEST_METHOD']=="DELETE"){
            $cmd = $pdo->prepare("DELETE FROM pessoa");
            $cmd->execute();
            $res = "Lista deletada";
        }
    
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $nome = isset($_POST['nome'])?$_POST['nome']:"";
            $email = isset($_POST['email'])?$_POST['email']:"";
            $cpf = isset($_POST['cpf'])?$_POST['cpf']:"";
            $res = "Erro ao Cadastrar";
          
            
    
                if($nome!=""&&$cpf!=""&&$email!=""){
    
                    $cmd = $pdo->prepare("SELECT id FROM pessoa WHERE email = :e or cpf = :c");
                    $cmd->bindValue(":e",$email);
                    $cmd->bindValue(":c",$cpf);
                    $cmd->execute();
            
                    if($cmd->rowCount()>=1){
                        $res = "CPF ou E-mail já cadastrado";
                    }else{
    
                    $cmd = $pdo->prepare("INSERT INTO pessoa(nome,cpf,email) VALUES (:n, :c, :e)");
                    $cmd->bindValue(":n",$nome);
                    $cmd->bindValue(":e",$email);
                    $cmd->bindValue(":c",$cpf);
                    $cmd->execute();
    
                    $res = "salvo";

                    }
                    
                }
        }

    	
    
            
            if($_SERVER['REQUEST_METHOD']=="GET"){
                $res = array();
                $cmd = $pdo->query("SELECT * FROM pessoa ORDER BY id" );
                $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            }
    
                

            echo json_encode($res);
        
            

    
    

    


?>