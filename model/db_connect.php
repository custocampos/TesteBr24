<?php

function baseUrl()
{
    return "https://b24-wtmhr1.bitrix24.com.br/rest/1/n4blibkld5dg9uxh";
}

function doRequest($queryUrl, $queryData)
{

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));

    $result = curl_exec($curl);
    curl_close($curl);

    if ($result) {
        return $result;
    }

}



     function createCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1590433615" => $data["nome"],
                "UF_CRM_1590430873" => $data["cpf"],
                "UF_CRM_1590433656" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }

     function getCompany($id)
    {

        $queryUrl = baseUrl() . '/crm.company.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));
        return doRequest($queryUrl, $queryData);

    }

     function getCompanyList()
    {
        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'order' => array("DATE_CREATE" => "ASC"),
            'select' => array("ID", "TITLE", "UF_CRM_1588901076", "UF_CRM_1588903094", "UF_CRM_1588901065", "PHONE", "EMAIL"),
        )
        );

        return doRequest($queryUrl, $queryData);
    }

     function deleteCompany($id)
    {
        $queryUrl = baseUrl() . '/crm.company.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        return doRequest($queryUrl, $queryData);

    }

     function updateCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.update.json';
        $queryData = http_build_query(array(
            'ID' => $data["id"],
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1590433615" => $data["nome"],
                "UF_CRM_1590430873" => $data["cpf"],
                "UF_CRM_1590433656" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));

        return doRequest($queryUrl, $queryData);
    }


    function updateCompanyDeal($data)
    {
        $queryUrl = baseUrl() . '/crm.company.update.json';
        $queryData = http_build_query(array(
            'ID' => $data["id"],
            'fields' => array(
                "UF_CRM_1590524286" => $data["total"],
                
                ),
        ));

    return doRequest($queryUrl, $queryData);
}



     function createContact($data)
    {
        $queryUrl = baseUrl() . '/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                'NAME' => $data["nome"],
                'LAST_NAME' => $data["sobrenome"],
                'COMPANY_ID' => $data["id"],
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }

    function createDeal($data)
    {
        $queryUrl = baseUrl() . '/crm.deal.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                'TITLE' => $data["nome"],
                'OPPORTUNITY' => $data["valor"],
                'COMPANY_ID' => $data["id"],
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }


    function getDeal($id)
    {

        $queryUrl = baseUrl() . '/crm.deal.list.json';
        $queryData = http_build_query(array(
            'filter' => array("COMPANY_ID" => $id),
        ));
        return doRequest($queryUrl, $queryData);

    }

     function getContact($id)
    {

        $queryUrl = baseUrl() . '/crm.contact.list.json';
        $queryData = http_build_query(array(
            'filter' => array("COMPANY_ID" => $id),
        ));
        return doRequest($queryUrl, $queryData);

    }

     function checkCpf($cpf)
    {

        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1590430873" => $cpf),
        ));
        return doRequest($queryUrl, $queryData);

    }

     function checkCnpj($cnpj)
    {

        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1590433656" => $cnpj),
        ));
        return doRequest($queryUrl, $queryData);

    }

    function test_duplicateCPF($docCPF){
        if ($docCPF) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function test_duplicateCNPJ($docCNPJ,$transformCnpj){
      
        if ($docCNPJ) {
            return $transformCnpj->result[0]->ID;
        } else {
            return 0;
        }
    }