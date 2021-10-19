<?php

namespace Pdf4me\API\Resources\Core;

use Pdf4me\API\Exceptions\MissingParametersExceptionPdf4meException;
use Pdf4me\API\Exceptions\ResponseException;
use Pdf4me\API\Http;
use Pdf4me\API\Resources\ResourceAbstract;
use Pdf4me\API\Traits\Utility\InstantiatorTrait;
use Pdf4me\API\Traits\Schema\PdfSchema;
use Pdf4me\API\Traits\Schema\PdfDataContractValidate;
use Pdf4me\API\Resources\Core\Attachments;

/**
 * The Pdf class exposes key methods for document
 */
class Pdf4me extends ResourceAbstract {

    use InstantiatorTrait;
    use PdfDataContractValidate;


    /**
     * Wrapper for common GET requests
     *
     * @param       $route
     * @param array $params
     *
     * @return \stdClass | null
     * @throws ResponseException
     * @throws \Exception
     */
    private function sendGetRequest($route, array $params = []) {
        $response = Http::send(
                        $this->client, $this->getRoute($route, $params), ['queryParams' => $params]
        );

        return $response;
    }

    /**
     * Declares routes to be used by this resource.
     */
    protected function setUpRoutes() {
        parent::setUpRoutes();

        $this->setRoutes([
                        'convertFileToPdf' =>'Convert/ConvertFileToPdf',
                        'convertToPdf'=>'Convert/ConvertToPdf',
                        'createThumbnails'=>'Image/CreateThumbnails',
                        'createThumbnail'=>'Image/CreateThumbnail',
                        'createImages'=> 'Image/CreateImages',
                        'createPdfA' => 'PdfA/CreatePdfA',
                        'pdfA'=>'PdfA/PdfA',
                        'extractResources' => 'Extract/ExtractResources',
                        'extractPages' => 'Extract/ExtractPages',
                        'extract' => 'Extract/Extract',
                        'merge2Pdfs'=>'Merge/Merge2Pdfs',
                        'merge'=>'Merge/Merge',
                        'optimizeByProfile'=>'Optimize/OptimizeByProfile',
                        'optimize' => 'Optimize/Optimize',
                        'splitRecurring' => 'Split/SplitRecurring',
                        'splitByPageNr' => 'Split/SplitByPageNr',
                        'split'=>'Split/Split',
                        'textStamp'=>'Stamp/TextStamp',
                        'stamp'=>'Stamp/Stamp',
                        'recognizeDocument'=>'Ocr/RecognizeDocument',
                        'rotatePage'=>'PdfA/RotatePage',
                        'rotateDocument'=>'PdfA/RotateDocument',
                        'rotate'=>'PdfA/Rotate',
                        'protectDocument'=>'PdfA/ProtectDocument',
                        'unlockDocument'=>'PdfA/UnlockDocument',
                        'protect'=>'PdfA/Protect',
                        'validateDocument'=>'PdfA/ValidateDocument',
                        'validate'=>'PdfA/Validate',
                        'repairDocument'=>'PdfA/RepairDocument',
                        'repair'=>'PdfA/Repair',
                        'metadata'=>'PdfA/Metadata',
                        'signPdf'=>'PdfA/SignPdf',
                        'readBarcodes' => 'Barcode/ReadBarcodes',
                        'readBarcodesByType'=>'Barcode/ReadBarcodesByType',
                        'createBarcodeByType'=>'Barcode/CreateBarcodeByType',
                        'createSwissQrBill'=>'SwissQR/CreateSwissQrBill',
                        'readSwissQrCode'=>'SwissQR/ReadSwissQrCode',
                        'createSwissQrBillList'=>'SwissQR/CreateSwissQrBillList',

                        'createArchiveJobConfig'=>'Job/CreateArchiveJobConfig',
                        'jobConfig' => 'job/jobConfigs',
                        'runJob'=>'Job/RunJob',
                        'saveJobConfig'=>'Job/SaveJobConfig',
                        'manageApiUsage'=>'Management/ApiUsage',
                        'manageVersion'=>'Management/Version',

                        'dropDocument'=>'Document/DropDocument',
                        'getContentDocument'=>'Document/GetDocument',
                        'getDocuments'=>'Document/GetDocuments',
                        'produceDocuments'=>'Document/ProduceDocuments',

                       
        ]);
    }
   
    /**
     * for readBarcodes api
     * @param array
     * 
     * return @array
     */
    public function readBarcodes(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','readBarcodes');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for readBarcodesByType
    * @param array
    * 
    * return @array
    */
    public function readBarcodesByType(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','readBarcodesByType');
        $response = $this->client->uploadMultipart(
                        $route, $params
        ); 

        return json_decode($response, true);
    }

    /**
    * for createBarcodeByType
    * @param array
    * 
    * return @array
    */
    public function createBarcodeByType(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','createBarcodeByType');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

       
    /**
     * for rotate api
     * @param array
     * 
     * return @array
     */
    public function rotate(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','rotate');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for rotateDocument
    * @param array
    * 
    * return @array
    */
    public function rotateDocument(array $params) {
    $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','rotateDocument');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

     /**
    * for rotatePage
    * @param array
    * 
    * return @array
    */
    public function rotatePage(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
      
        $this->checkValidationSchemaGetData($params,$route,'post','rotatePage');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

    
    /**
     * for protect api
     * @param array
     * 
     * return @array
     */
    public function protect(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','protect');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for protectDocument
    * @param array
    * 
    * return @array
    */
    public function protectDocument(array $params) {
    $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','protectDocument');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

     /**
    * for unlockDocument
    * @param array
    * 
    * return @array
    */
    public function unlockDocument(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
      
        $this->checkValidationSchemaGetData($params,$route,'post','unlockDocument');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

        
    /**
     * for protect api
     * @param array
     * 
     * return @array
     */
    public function validate(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','validate');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for protectDocument
    * @param array
    * 
    * return @array
    */
    public function validateDocument(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','validateDocument');
        $response = $this->client->uploadMultipart(
                        $route, $params
        ); 
        return json_decode($response, true);
        //$res_1 = serialize($res);
        //return unserialize($res_1);
    }

    /**
     * for repair api
     * @param array
     * 
     * return @array
     */
    public function repair(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','repair');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for repairDocument
    * @param array
    * 
    * return @array
    */
    public function repairDocument(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','repairDocument');
        return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

    /**
     * for signPdf api
     * @param array
     * 
     * return @array
     */
    public function signPdf(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','signPdf');
        return $this->client->post(
                        $route, $params
        );   
    }
      
    /**
    * for metadata api
    * @param array
    * 
    * return @array
    */
    public function metadata(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','metadata');
        $res = $this->client->uploadMultipart(
            $route, $params
        ); 
        return json_decode($response, true);
        //$res_1 = serialize($res);
        //return unserialize($res_1);
    }


    
    /**
     * for convertFileToPdf api
     * 
     * return @array
     */
    public function convertFileToPdf(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','convertFileToPdf');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for textStamp api
     * 
     * return @array
     */
    public function textStamp(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','textStamp');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for splitByPageNr
     * 
     * return @array
     */
    public function splitByPageNr(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','splitByPageNr');
         //return $this->client->uploadMultipart(
        //                $route, $params
        //);

        $response = $this->client->uploadMultipart(
            $route, $params
        );
        // split response into seperate array
        //$splitResponse = serialize(explode(",",str_replace('"','', str_replace('[','', str_replace(']','', $response)))));
        //return unserialize($splitResponse);
        return json_decode($response, true);
    }

    /**
     * for splitRecurring
     * 
     * return @array
     */
    public function splitRecurring(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
          $this->checkValidationSchemaGetData($params,$route,'post','splitRecurring');
           //return $this->client->uploadMultipart(
          //                $route, $params
          //);
  
          $response = $this->client->uploadMultipart(
              $route, $params
          );
          // split response into seperate array
          //$splitResponse = serialize(explode(",",str_replace('"','', str_replace('[','', str_replace(']','', $response)))));
          //return unserialize($splitResponse);
          return json_decode($response, true);
      }
    
    /**
     * for createPdfA
     * 
     * return @array
     */
    public function createPdfA(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createPdfA');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for  optimizeByProfile
     * @param array
     * 
     * return @array
     */
    public function optimizeByProfile(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','optimizeByProfile');
        return $this->client->uploadMultipart(
                        $route, $params
        );    
    }
    
    /**
     * for recognizeDocument
     * @param array
     * 
     * return @array
     */
    public function recognizeDocument(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','recognizeDocument');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for mserge2Pdf
     * @param array
     * 
     * return @array
     */
    public function merge2Pdfs(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','merge2Pdfs');
        return $this->client->uploadMultipart(
                        $route, $params
        );     
    }
    
    /**
     * for manageApiUsage
     * @param array
     * 
     * return @array
     */
    public function manageApiUsage(array $params = []) {
      $route = $this->getRoute(__FUNCTION__, $params);
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for manageVersion
     * @param array
     * 
     * return @array
     */
    public function manageVersion(array $params = []) {
      $route = $this->getRoute(__FUNCTION__, $params);
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for saveJobConfig
     * @param array
     * 
     * return @array
     */
    public function saveJobConfig(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','saveJobConfig');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for runJob
     * @param array
     * 
     * return @array
     */
    public function runJob(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','runJob');
        return $this->client->post(
                        $route, $params
        ); 
    }
    /**
     * for createArchiveJobConfig
     * @param array
     * 
     * return @array
     */
    public function createArchiveJobConfig(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createArchiveJobConfig');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for createThumbnail
     * @param array
     * 
     * return @array
     */
    public function createThumbnail(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createThumbnail');
            return $this->client->uploadMultipart(
                        $route, $params
        );   
    }

    /**
     * for createThumbnails
     * 
     * return @array
     */
    public function createThumbnails(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
        $this->checkValidationSchemaGetData($params,$route,'post','createThumbnails');
  
        $response = $this->client->uploadMultipart(
            $route, $params
        );
        return json_decode($response, true);
        // split response into seperate array
        //$thumbnailResponse = explode(",",str_replace('"','',explode("]", explode("[", $response)[1])[0]));
        //return $thumbnailResponse;
     }
    
    /**
     * for extract api
     * @param array
     * 
     * return @array
     */
    public function extract(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','extract');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for extractPages
     * @param array
     * 
     * return @array
     */
    public function extractPages(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','extractPages');
         return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }

        /**
     * for extractResources api
     * @param array
     * 
     * return @array
     */
    public function extractResources(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
  
          $this->checkValidationSchemaGetData($params,$route,'post','extractResources');
          return $this->client->post(
                          $route, $params
          );   
      }
    
    
    /**
     * for produceDocument
     * @param array
     * 
     * return @array
     */
    public function produceDocuments(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','produceDocuments');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for dropDocument
     * @param array
     * 
     * return @array
     */
    public function dropDocument(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','dropDocument');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for getConententDocument Api
     * @param array
     * 
     * return @array
     */
    public function getContentDocument(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','getContentDocument');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for convertToPdf Api
     * @param array
     * 
     * return @array
     */
    public function convertToPdf(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);
        
        $this->checkValidationSchemaGetData($params,$route,'post','convertToPdf');
        $this->checkParamConditionValidate($params,'convertToPdf');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * get documents
     * @param array
     * 
     * return @array
     */
    public function getDocuments(array $params){
        $route = $this->getRoute(__FUNCTION__);
        $this->checkValidationSchemaGetData($params,$route,'get','getDocuments');
       return $this->client->get(
               $route, $params);
    }
    /**
     * stamp pdf
     * @param array
     * 
     * return @array
     */
    public function stamp(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','stamp');
        $this->checkParamConditionValidate($params,'stamp');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    
    /**
     * split pdf
     * @param array
     * 
     * return @array
     */
    public function split(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','split');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * to create image
     * @param array
     * 
     * return @array
     */
    public function createImages(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createImages');
        return $this->client->post(
                        $route, $params
        ); 
    }

    /**
     * To get pdfoptimizater
     * @param array
     * 
     * return @array
     * 
     */
    public function optimize(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','optimize');
        return $this->client->post(
                        $route, $params
        );
    }
    
    /**
     * To get PdfA
     * @param array
     * 
     * return @array
     */
    public function pdfA(array $params) {
         $route = $this->getRoute(__FUNCTION__, $params);
         $this->checkValidationSchemaGetData($params,$route,'post','pdfA');
         return $this->client->post(
                        $route, $params
        );
    }
    
    /**
     * To merge Pdf
     * @param array
     * 
     * return @array
     */
    public function merge(array $params) {
         $route = $this->getRoute(__FUNCTION__, $params);
         $this->checkValidationSchemaGetData($params,$route,'post', 'merge');
         $this->checkParamConditionValidate($params,'merge');
         return $this->client->post(
                        $route, $params
        );
    }

    /**
     * To get CreateSwissQrBill
     * @param array
     * 
     * return @array
     */
    public function createSwissQrBill(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
        $this->checkValidationSchemaGetData($params,$route,'post','createSwissQrBill');
        return $this->client->post(
                       $route, $params
       );
    }
    
    /**
     * To get ReadSwissQrCode
     * @param array
     * 
     * return @array
     */
    public function readSwissQrCode(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
        $this->checkValidationSchemaGetData($params,$route,'post','readSwissQrCode');
        return $this->client->post(
                       $route, $params
       );
    }
    
    /**
    * To get CreateSwissQrBillList
    * @param array
    * 
    * return @array
    */
    public function createSwissQrBillList(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);
        $this->checkValidationSchemaGetData($params,$route,'post','createSwissQrBillList');
        return $this->client->post(
                        $route, $params
        );
    }

    /**
     * To get jobconfig parameter
     * @param array
     * 
     * return @array
     */
    public function jobConfig() {
        $response = $this->client->get($this->getRoute(__FUNCTION__));
        return $response;
    }

}

