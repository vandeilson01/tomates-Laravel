<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <title>Demo OpenPix Plugin</title>
  </head>

  <body>
    <button onclick="displayOpenPixModal()">
      Clique para abrir o modal
    </button>
    <script src="https://plugin.openpix.com.br/v1/openpix.js" async></script>
    <script>
      function displayOpenPixModal() {
        window.$openpix = window.$openpix || [];

        window.$openpix.push(['config', {
          appID: 'Q2xpZW50X0lkX2Y2YmY4ZjlhLTljMjYtNGE0OC1iNjlkLWZlNTIzYzAyM2RkMjpDbGllbnRfU2VjcmV0X1FxK01UOHNVRTM0bS9VT3NjMTJWbVV5MDROclVyMitEUEtsWFlZNG1ua1k9',
        }]);

        window.$openpix.push([
          'pix',
          {
            value: 1,
            correlationID: 'Client_Id_f6bf8f9a-9c26-4a48-b69d-fe523c023dd2',
            description: 'pacote de 5 tomates',
          },
        ]);
      }
    </script>
  </body>

</html>