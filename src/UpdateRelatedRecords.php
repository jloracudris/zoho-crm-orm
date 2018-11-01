<?php 
namespace Wabel\Zoho\CRM;
use Wabel\Zoho\CRM\Exception\ZohoCRMException;
use Wabel\Zoho\CRM\Exception\ZohoCRMResponseException;
use Wabel\Zoho\CRM\Exception\ZohoCRMUpdateException;
use Wabel\Zoho\CRM\Request\Response;
use Wabel\Zoho\CRM\SimpleXMLExtended;

class UpdateRelatedRecords extends \AbstractZohoDao 
{

    public function __construct(ZohoClient $zohoClient) {        

        parent::__construct( $zohoClient );
    }

    /**
     * Implements updateRelatedRecords API method.
     *
     * @param array $beans     The list of beans to update.
     * @param bool  $wfTrigger Set value as true to trigger the workflow rule in Zoho
     *
     * @return Response The Response object
     *
     * @throws ZohoCRMException
     */
    public function updateRelatedRecords(AbstractZohoDao $dao, $id = null, $relatedModule = null)
    {
        $records = [];

        $xmlData = parent::toXml([$dao]);                
        $response = $this->zohoClient->updateRelatedRecords($this->getModule(), $xmlData, $id, $relatedModule);
        /* $records = array_merge($records, $response->getRecords()); */
    }
}
?>