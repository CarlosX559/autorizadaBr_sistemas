<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutorizadaBr - Gestão Online</title>
    <link rel="stylesheet" href="css/style.css">

    <!--<meta property="article:author" content="https://www.autorizadabr.com.br/">-->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <header>
        <div class="menu_mobile">

            <svg class="menu_open" width="64" height="30" viewBox="0 0 64 30" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect width="64" height="2" rx="1" fill="#003E59" />
                <rect y="14" width="42.9589" height="2" rx="1" fill="#003E59" />
                <rect y="28" width="56.9863" height="2" rx="1" fill="#003E59" />
            </svg>

            <a href="index.html">
                <img src="img/logo_gestao_online_menu.svg" alt="" width="234" height="34">
            </a>

        </div>


        <div class="container_menu" id="container_menu">
            <div class="container_menu_int">
                <div class="area_menu">

                    <svg class="close" width="33" height="32" viewBox="0 0 33 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.583984" y="30.4811" width="42.9589" height="2" rx="1"
                            transform="rotate(-45 0.583984 30.4811)" fill="#D9D9D9" />
                        <rect x="30.9604" y="31.8955" width="42.9589" height="2" rx="1"
                            transform="rotate(-135 30.9604 31.8955)" fill="#D9D9D9" />
                    </svg>


                    <a href="index.html">
                        <img class="logo_desktop" src="img/logo_gestao_online_menu.svg" alt="" width="234" height="34">
                    </a>

                    <nav>
                        <ul>
                            <li>
                                <a href="#solucoes">
                                    Soluções
                                </a>
                            </li>
                            <li>
                                <a href="#gerenciaveis">
                                    Módulos Gerenciais
                                </a>
                            </li>
                            <li>
                                <a href="#planos">
                                    Planos
                                </a>
                            </li>
                            <li>
                                <a href="#parceiro">
                                    Parceiro
                                </a>
                            </li>
                            <!--<li>
                                <a href="#">
                                    Contato
                                </a>
                            </li>-->
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>


    <?php

    if (!empty($_POST['cnpj']) && isset($_POST['cnpj'])) {
        $curl = curl_init();

        // Coloque aqui sua Chave de API
        $api_key = "55e11ff2-e520-480c-a7b5-de5b92baafb8-5ad5386e-f68f-4351-a130-a542ef7634e2";

        // Escolha o CNPJ para testar
        $cnpj = addslashes($_POST['cnpj']);
        $tax_id = $cnpj;


        // Executa a chamada para API CNPJá!
        $cnpja_url = "https://api.cnpja.com/office/";

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $cnpja_url . $tax_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: " . $api_key
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);

        //echo "Resposta da API: <br>" . $response . "<br><br>";
    
        // Decodifica o JSON de retorno
        $resp_json = json_decode($response);


        // Acessa as propriedades que desejar
    
        $nome = $resp_json->company->name;
        foreach ($resp_json->emails as $key => $value) {
            $email = $value->address;
        }

        $cep = $resp_json->address->zip;

        foreach ($resp_json->phones as $key => $value) {
            $telefone = $value->number;
        }

        $numero = $resp_json->address->number;
        $bairro = $resp_json->address->street;
        $cidade = $resp_json->address->city;
        $uf = $resp_json->address->state;

        /*echo "CEP: " . $resp_json->address->zip . "<br><br>";
    
        foreach ($resp_json->phones as $key => $value) {
            echo "Telefone: " . $value->number . "<br><br>";
        }
    
        foreach ($resp_json->emails as $key => $value) {
            echo "E-mail: " . $value->address . "<br><br>";
        }
        echo "Nome Fantasia: " . $resp_json->alias . "<br><br>";
        echo "Nome completo: " . $resp_json->company->name . "<br><br>";*/
        // etc...
    

        $cnpj_form = addslashes($_POST['cnpj']);
        $nome_form = addslashes($_POST['nome']);
        $email_form = addslashes($_POST['email']);
        $telefone_form = addslashes($_POST['telefone']);
        $cep_form = addslashes($_POST["cep"]);
        $numero_form = addslashes($_POST["numero"]);
        $bairro_form = addslashes($_POST["bairro"]);
        $cidade_form = addslashes($_POST["cidade"]);
        $uf_form = addslashes($_POST["uf"]);

        $email_to = "";

        $assunto = "AutorizadaBr";

        $header = 'MIME-Version: 1.1' . "\r\n" .
            'Content-type: text/html; charset=utf-8' . "\r\n" .
            'From: Simili Pianos <$email_to>' . "\r\n" .
            'Return-Path: $email_to' . "\r\n" .
            'Reply-To: $email' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


        // Dados que serao enviados.
        $body = "Nome: " . $nome_form . " " . "<br>" . "\r\n" .
            "CNPJ: " . $cnpj_form . " " . "<br>" . "\r\n" .
            "E-mail: " . $email_form . " " . "<br>" . "\r\n" .
            "Telefone: " . $telefone_form . " " . "<br>" . "\r\n" .
            "Cep: " . $cep_form . " " . "<br>" . "\r\n" .
            "Número: " . $numero_form . " " . "<br>" . "\r\n" .
            "Bairro: " . $bairro_form . " " . "<br>" . "\r\n" .
            "Cidade: " . $cidade_form . " " . "<br>" . "\r\n" .
            "UF: " . $uf_form;

        //Enviando o email.
        //$status = mail($email_to, $assunto, $body, $header);

    }



    ?>

    <div class="container_form">
        <div class="container_form_int">
            <div class="area_form">
                <form action="form.php" method="POST">

                    <div class="area_form_int">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="cnpj" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                    </div>


                    <div class="area_form_total">
                        <div class="area_form_int">
                            <label for="cep">Nome</label>
                            <input type="text" class="nome" name="nome" id="nome" placeholder="Nome"
                                value="<?php echo isset($nome) ? $nome : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="email">E-mail</label>
                            <input type="text" class="email" name="email" id="email" placeholder="E-mail"
                                value="<?php echo isset($email) ? $email : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="telefone" name="telefone" id="telefone" placeholder="Telefone"
                                value="<?php echo isset($telefone) ? $telefone : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="cep">CEP</label>
                            <input type="text" class="cep" name="cep" id="cep" placeholder="CEP"
                                value="<?php echo isset($cep) ? $cep : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="numero">Número</label>
                            <input type="text" class="numero" name="numero" id="numero" placeholder="Número"
                                value="<?php echo isset($numero) ? $numero : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="bairro" name="bairro" id="bairro" placeholder="Bairro"
                                value="<?php echo isset($bairro) ? $bairro : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="cidade" name="cidade" id="cidade" placeholder="Cidade"
                                value="<?php echo isset($cidade) ? $cidade : "" ?>">
                        </div>

                        <div class="area_form_int">
                            <label for="uf">UF</label>
                            <input type="text" class="uf" name="uf" id="uf" placeholder="UF"
                                value="<?php echo isset($uf) ? $uf : "" ?>">
                        </div>



                    </div>



                    <input type="submit" value="enviar" class="enviar">

                </form>
            </div>
        </div>
    </div>






    <footer>
        <div class="container_footer">
            <div class="container_footer_int">
                <div class="area_footer">
                    <div class="footer_col">
                        <a href="index.html">
                            <img class="logo_footer" src="img/logo_footer.svg" alt="Gestão Online" loading="lazy">
                        </a>
                        <!--<img class="logo_agnus" src="img/logoAgnus.webp" alt="Agnus" loading="lazy">-->
                    </div>


                    <div class="footer_col">
                        <div class="title_solucoes">
                            <h2>Soluções</h2>
                        </div>
                        <div class="area_solucoes_total">
                            <div class="area_solucoes_footer">
                                <a href="https://agnusempresarial.com.br/?page_id=2074" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Lojas</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2805" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Moda</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2821" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Padarias</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2813" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Calçados</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2830" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Eletrônicos</p>
                                    </div>
                                </a>

                            </div>
                            <div class="area_solucoes_footer">
                                <a href="https://agnusempresarial.com.br/?page_id=2862" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Gás</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2290" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Construção</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2849" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Açougues</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2831" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Livrarias</p>
                                    </div>
                                </a>
                                <a href="https://agnusempresarial.com.br/?page_id=2865" target="_blank">
                                    <div class="info_solucoes">
                                        <p>Mercados</p>
                                    </div>
                                </a>

                            </div>
                        </div>

                    </div>

                    <div class="footer_col">
                        <div class="title_contato">
                            <h2>contatos</h2>
                        </div>
                        <a href="https://wa.me/5514997854114?text=Ol%C3%A1%2C+quero+fazer+meu+or%C3%A7amento%21"
                            target="_blank">
                            <div class="whats">
                                <img src="img/whatsapp.png" alt="">
                                <p>(14) 99785-4114</p>
                            </div>
                        </a>
                        <a href="https://wa.me/5514997854114?text=Ol%C3%A1%2C+quero+fazer+meu+or%C3%A7amento%21"
                            target="_blank">
                            <div class="whats">
                                <img src="img/whatsapp.png" alt="">
                                <p>(41) 99511-4006</p>
                            </div>
                        </a>
                        <div class="email">
                            <img src="img/email.png" alt="">
                            <p>
                                contato@agnusempresarial.com.br
                            </p>
                        </div>
                        <div class="redes_sociais">
                            <a href="https://www.facebook.com/AGNUSEMPRESARIAL" target="_blank">
                                <img src="img/facebook.png" alt="facebook">
                            </a>

                            <a href="https://www.facebook.com/AGNUSEMPRESARIAL" target="_blank">
                                <img src="img/telegram.png" alt="telegram">
                            </a>
                            <a href="https://www.instagram.com/agnusempresarial/" target="_blank">
                                <img src="img/instagram.png" alt="instagram">
                            </a>

                            <a href="https://download.teamviewer.com/download/version_11x/TeamViewer_Setup.exe"
                                target="_blank">
                                <img src="img/team_viewer.png" alt="team">
                            </a>
                            <a href="https://anydesk.com/pt/downloads/thank-you?dv=win_exe" target="_blank">
                                <img src="img/anydesk.png" alt="anydesk">
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </footer>
    <div class="copy">
        <p>Copyright ® 2023. Todos os direitos reservados. Desenvolvido por <a href="https://carlosxavier.dev.br/"
                target="_blank">Carlos Xavier</a></p>
    </div>


    <script defer src="js/script.js"></script>
</body>

</html>