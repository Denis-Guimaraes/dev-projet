<?php
namespace MotivOnline\Controller;

use MotivOnline\Model\CompanyModel;
use MotivOnline\Util\User;

class CompanyController extends CoreController
{
    private $templateName;
    private $data;

    public function showCompany(array $params)
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        // Get parameters
        $companyId = $params['companyId'];
        $user = User::getConnectedUser();
        $userid = $user->getId();
        // Get company
        $companyModel = new CompanyModel();
        $companyModel->setUserId($userid);
        $company = $companyModel->findCompany($companyId);
        // Set data and return viewCompany view
        $this->templateName = 'company/viewCompany';
        $this->data['company'] = $company;
        $this->show($this->templateName, $this->data);
    }

    public function updateCompany(array $params)
    {
        if (!User::isConnected()) {
            $this->redirect('main_home');
        }
        // Get and set parameters
        $letterId = $params['id'];
        $companyId = $params['companyId'];
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $recipientName = (isset($_POST['recipientName'])) ? $_POST['recipientName'] : '';
        $address = (isset($_POST['address'])) ? $_POST['address'] : '';
        $city = (isset($_POST['city'])) ? $_POST['city'] : '';
        $zipCode = (isset($_POST['zipCode'])) ? $_POST['zipCode'] : '';
        $user = User::getConnectedUser();
        $userid = $user->getId();

        // Set company and update it in database
        $companyModel = new CompanyModel();
        $companyModel->setUserId($userid);
        $companyModel->setName($name);
        $companyModel->setRecipientName($recipientName);
        $companyModel->setAddress($address);
        $companyModel->setCity($city);
        $companyModel->setZipCode($zipCode);
        $result = $companyModel->update($companyId);
        // Redirect to letter
        $parameter = [
            'id' => $letterId,
        ];
        $this->redirect('letter_view', $parameter);
    }
}
