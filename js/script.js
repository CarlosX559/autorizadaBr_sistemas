const nfe1 = [
    'img/nfe_principal.png',
    'NF-e',
    'Emita Uma Nota Fiscal em Segundos com Nosso Design Intuitivo.',
    'Acesso do Contador as Notas Fiscais.',
    'Converta um Orçamento em Nota Fiscal.',
];

const nfe2 = [
    'img/nfe_consumidor_principal.png',
    'NFC-e',
    'Faça suas Vendas com Mais Segurança.',
    'Compatibilidade com Leitor de Código de Barras.',
    'Acesso do Contador as Notas Fiscais de Consumidor.',
    'Transmissão Automática para a SEFAZ.',
];

const nfe3 = [
    'img/cte_principal.png',
    'CT-e',
    'Acesso do Contador aos CT-e.',
    'A Emita CT-e em Segundos Apartir de um NF-e.',
    'Emita CT-e em Segundos Apartir de um NF-e.',
];


const nfe4 = [
    'img/dfe_principal.png',
    'DF-e',
    'Emissão de Notas Fiscais com Agilidade e Segurança.',
    'Acesso do Contador as Notas Fiscais Emitidas.',
    'Emita suas Notas Fiscais com Agilidade.',

];


let btn = document.querySelectorAll(".icones_nfe");
let image = document.querySelector(".nfe_info");
let title = document.querySelector(".title_nfe h2");
let infos = document.querySelectorAll(".area_infos_nfe ul li");


const removeActive = () => {
    //Transformando o nodelist em array
    const btnActive = [...document.querySelectorAll(".icones_nfe.active")];
    //map para percorrer
    btnActive.map((el) => {
        el.classList.remove("active");
    })

}

btn.forEach((element, value) => {

    element.addEventListener('click', () => {

        switch (value) {
            case 0:
                removeActive()
                element.classList.toggle("active");

                //Imagem principal
                image.src = nfe1[0];
                //Titulo principal
                title.innerHTML = nfe1[1];
                //Infos principais
                infos.forEach((element, key) => {
                    if (key == 0) {
                        infos[0].innerHTML = nfe1[2];
                        infos[1].innerHTML = nfe1[3];
                        infos[2].innerHTML = nfe1[4];
                    }

                });
                break;
            case 1:
                removeActive()
                element.classList.toggle("active");
                //Imagem principal
                image.src = nfe2[0];
                //Titulo principal
                title.innerHTML = nfe2[1];
                //Infos principais
                infos.forEach((element, key) => {
                    if (key == 0) {
                        infos[0].innerHTML = nfe2[2];
                        infos[1].innerHTML = nfe2[3];
                        infos[2].innerHTML = nfe2[4];
                    }

                });

                break;

            case 2:
                removeActive()
                element.classList.toggle("active");
                //Imagem principal
                image.src = nfe3[0];
                //Titulo principal
                title.innerHTML = nfe3[1];
                //Infos principais
                infos.forEach((element, key) => {

                    if (key == 0) {
                        infos[0].innerHTML = nfe3[2];
                        infos[1].innerHTML = nfe3[3];
                        infos[2].innerHTML = nfe3[4];
                    }

                });

                break;

            case 3:
                removeActive()
                element.classList.toggle("active");
                //Imagem principal
                image.src = nfe4[0];
                //Titulo principal
                title.innerHTML = nfe4[1];
                //Infos principais
                infos.forEach((element, key) => {

                    if (key == 0) {
                        infos[0].innerHTML = nfe4[2];
                        infos[1].innerHTML = nfe4[3];
                        infos[2].innerHTML = nfe4[4];
                    }

                });

                break;

        }


    });


});

function menu() {

    let open = document.querySelector(".menu_open");
    let menu = document.getElementById("container_menu");
    open.addEventListener("click", () => {
        menu.style.display = "flex";
        menu.style.left = "0px";
        menu.style.animation = "move ease-in 400ms";
    });



    let close = document.querySelector(".close");

    close.addEventListener("click", () => {
        menu.style.display = "flex";
        menu.style.left = "-100%";
        menu.style.animation = "move ease-out 400ms";
    });


    let area_menu = document.querySelectorAll(".area_menu nav ul li a");

    area_menu.forEach((element) => {
        element.addEventListener("click", () => {
            menu.style.left = "-100%";
            menu.style.animation = "move ease-out 400ms";
        });
    });
}
menu();
const animations = document.querySelectorAll("[data-animation]");
const animationClass = "animate";

function animation_scroll() {
    const area_window = window.innerHeight * 0.21 * 3.8;

    animations.forEach((element) => {
        let posicaoAtual = element.getBoundingClientRect().top;

        if (area_window > posicaoAtual) {
            element.classList.add(animationClass);
        } else {
            element.classList.remove(animationClass);
        }
    });
}

if (animations.length) {
    window.addEventListener("scroll", animation_scroll);
}

const removeActive_sistemas = () => {
    //Transformando o nodelist em array
    const btnActive = [...document.querySelectorAll(".area_logo_sistema.active")];
    //map para percorrer
    btnActive.map((el) => {
        el.classList.remove("active");
    });

}

function sistemas() {

    let btn_sistemas = document.querySelectorAll(".area_logo_sistema");
    let title_sistemas = document.querySelector('.title_sistemas_autorizadaBr h2');
    let sub_title_sistemas = document.querySelector('.info_sistemas_autorizadaBr p');
    let imgs_sistemas = document.querySelector('.imgs_sistemas');

    btn_sistemas.forEach((element, id) => {
        element.addEventListener('click', () => {

            switch (id) {
                case 0:
                    removeActive_sistemas()
                    element.classList.toggle("active");
                    imgs_sistemas.src = 'img/degust_chef_sistemas.webp';
                    title_sistemas.innerHTML = "Degust chef";
                    sub_title_sistemas.innerHTML = "Com o Degust chef, você moderniza a gestão e o atendimento, com muito mais mobilidade e agilidade, focando na satisfação do cliente e no crescimento de seu negócio. Sistema voltado para bares e restaurantes, em que a comanda é emitida direto para a cozinha, além do fechamento por mesa, oferecendo diversas opções de pagamentos como crédito, débito, dinheiro ou Pix."
                    break;

                case 1:
                    removeActive_sistemas()
                    element.classList.toggle("active");
                    imgs_sistemas.src = 'img/mobile_pay_sistemas.webp';
                    title_sistemas.innerHTML = "Mobile pay";
                    sub_title_sistemas.innerHTML = "Uma nova forma de vender em seu estabelecimento!<br><br>Com o mobile instalado em sua máquina de cartão, você ganha um PDV móvel completo para usar em toda a loja, totalmente integrado ao seu sistema e ERP, reunindo tudo o que você precisa para agilizar o atendimento ao cliente com total segurança e tranquilidade."
                    break;

                case 2:
                    removeActive_sistemas()
                    element.classList.toggle("active");
                    imgs_sistemas.src = 'img/gestao_sistemas.webp';
                    title_sistemas.innerHTML = "Gestão";
                    sub_title_sistemas.innerHTML = "Com o sistema instalado em seu equipamento local, facilite a gestão de sua loja e tenha total controle de suas vendas, estoque e financeiro integrados, além do controle de documentos fiscais."
                    break;
                case 3:
                    removeActive_sistemas()
                    element.classList.toggle("active");
                    imgs_sistemas.src = 'img/gestao_online_sisistemas.webp';
                    title_sistemas.innerHTML = "Gestão online";
                    sub_title_sistemas.innerHTML = "Tenha total controle de suas vendas, estoque e financeiro de forma totalmente online, podendo acessar em qualquer dispositivo e em qualquer lugar, acompanhando seus lucros com maior facilidade e ganhando tempo para focar no crescimento do seu negócio."
                    break;
                case 4:
                    removeActive_sistemas()
                    element.classList.toggle("active");
                    imgs_sistemas.src = 'img/venda_rapida_sistemas.webp';
                    title_sistemas.innerHTML = "Venda rápida";
                    sub_title_sistemas.innerHTML = "Tenha o controle básico e rápido e emita seu cupom e nota fiscal, e o melhor, tudo 100% online."
                    break;
            }

        });

    })


}

sistemas();