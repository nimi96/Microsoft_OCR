<html> 
 <head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 </head>
 <body>
 <p>This example shows how to post an image to the Project Oxford Emotion API using a binary file</p>
 <input type="file" id="filename" name="filename">
 <button id="btn">Click here</button>
 <p id="response"></p>


<script type="text/javascript">


 //apiKey: Replace this with your own Project Oxford Emotion API key, please do not use my key. I include it here so you can get up and running quickly but you can get your own key for free at https://www.projectoxford.ai/emotion 
 

 var apiKey="070f08e4ebe04af78077ff6822d4d862";
 
 //apiUrl: The base URL for the API. Find out what this is for other APIs via the API documentation

 var apiUrl="https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/ocr?";
 
 $('#btn').click(function () {
 //file: The file that will be sent to the api
 var file = document.getElementById('filename').files[0];
 
 CallAPI(file, apiUrl, apiKey);
 });
 
 function CallAPI(file, apiUrl, apiKey)
 {
 $.ajax({
 url: apiUrl,
 beforeSend: function (xhrObj) {
 xhrObj.setRequestHeader("Content-Type","application/octet-stream");
 xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key",apiKey);
 },
 type: "POST",
 data: file,
 processData: false
 
 })
 .done(function (response) {
 ProcessResult(response);
 })
 .fail(function (error) {
 $("#response").text(error.getAllResponseHeaders());
 });
 }
 
 function ProcessResult(response)
 {
 var data = JSON.stringify(response.regions);
 $("#response").text(data);
 }
 </script>
 </body>
 
 </html>

