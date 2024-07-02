function makePayment() {
    var form = document.querySelector("#paymentForm");
    var paymentEngine = RmPaymentEngine.init({
        key: 'eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJWcjFaMXFEbURsZDNwMjZpQnBobW5jbHhwaU1XYlBTeDJDRUEwdk1aeWJBIn0.eyJleHAiOjE3MDMyNzY0NjksImlhdCI6MTcwMzI3Mjg2OSwianRpIjoiY2I2ZTNiMzItMTIyZC00OGI1LTkwYjEtNjIyNjY0NDZjNGE0IiwiaXNzIjoiaHR0cDovLzEwLjEuMS44Mjo5MTgwL2tleWNsb2FrL3JlbWl0YS9leGFwcC9hcGkvdjEvcmVkZ2F0ZS9hdXRoL3JlYWxtcy9yZW1pdGEiLCJhdWQiOlsiZGlzY292ZXJ5LXNlcnZlciIsImFjY291bnQiXSwic3ViIjoiYTViYTdiNDEtNjQ0NS00YzdiLTgyMDktYmE4YzJhODU1MTdmIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoicmVtaXRhdWFhLXNlcnZpY2UiLCJzZXNzaW9uX3N0YXRlIjoiZTczNmIwOWUtNTA3Yy00MGFhLWJkNTktMWE5OGM5Mzc3NDVlIiwiYWNyIjoiMSIsImFsbG93ZWQtb3JpZ2lucyI6WyJodHRwczovL2xvZ2luLnJlbWl0YS5uZXQiXSwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbIm9mZmxpbmVfYWNjZXNzIiwidW1hX2F1dGhvcml6YXRpb24iXX0sInJlc291cmNlX2FjY2VzcyI6eyJkaXNjb3Zlcnktc2VydmVyIjp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50Iiwidmlldy1wcm9maWxlIl19LCJhY2NvdW50Ijp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50IiwibWFuYWdlLWFjY291bnQtbGlua3MiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6ImVtYWlsIHByb2ZpbGUiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwibmFtZSI6IjAxMSAwMTEiLCJwcmVmZXJyZWRfdXNlcm5hbWUiOiI2dXdubXRyanBiNHQwa2plIiwiZ2l2ZW5fbmFtZSI6IjAxMSIsImZhbWlseV9uYW1lIjoiMDExIiwib3JnYW5pc2F0aW9uLWlkIjoiQ1dHREVNTyIsImVtYWlsIjoiMDExIn0.U5epA_DqbOuVq0LZxyrdJHjZHExO_1s837-sYQIzmztROtjiGldPLNa3Es5q48ko14hoGIvk5x-QbG-_If1s6NBfudpcQ44JoSRnWorwmOpjwpxBXVkmcRBVIEZrpKYCidzByBD0ZD0MnRsCRFk4eAeKIC0ryoez6Qe-hapCJ-A_Qlp4iXpTp0ypaFGmsegDENSz-EaTisb-BV78o19WntRkawc_KP21zH8yyC0UakTEN9o60Sdwd5-_isY77oehFZwU3WLHqepCNCNv5WXfJOH2Q6NXpuGo0T06rFG0D1AGXZu-kwLdu0bKjXqSmhTHrL-ejHNoDUJ0eOBwyEZzSA',
        merchantName: 'Remita Tests',
        transactionCategoryId: '501520',
        processRrr: true,
        transactionId: document.getElementById("ref").value, //you are expected to generate new values for the transactionId for each transaction processing.
        channel: "CARD,USSD", //this field is used to filter what card channels you want enabled on the payment modal
        extendedData: { 
            customFields: [{ 
                name: document.getElementById("name").value,
                value: document.getElementById("amount").value //rrr to be processed.
            }
]
        },
        onSuccess: function (response) {
            console.log('callback Successful Response', response);
        },
        onError: function (response) {
            console.log('callback Error Response', response);
        },
        onClose: function () {
            console.log(response)
            console.log("closed");
        }
    });
    paymentEngine.showPaymentWidget();
}