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

btn.forEach((element, value) => {

    element.addEventListener('click', () => {
        switch (value) {
            case 0:
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


