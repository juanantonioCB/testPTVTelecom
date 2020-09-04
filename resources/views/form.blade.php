@extends('layout')
@section('title')
    <h1>Formulario</h1>


    <style>
        #btnSaveSign {
            color: #fff;
            background: #f99a0b;
            padding: 5px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            margin-top: 10px;
        }

        #signArea {
            width: 304px;
            margin: 15px auto;
        }

        .sign-container {
            width: 90%;
            margin: auto;
        }

        .sign-preview {
            width: 150px;
            height: 50px;
            border: solid 1px #CFCFCF;
            margin: 10px 5px;
        }

        .tag-ingo {
            font-family: cursive;
            font-size: 12px;
            text-align: left;
            font-style: oblique;
        }

        .center-text {
            text-align: center;
        }

    </style>

@endsection
@section('content')



<div class="container">
<div class="row">
    <div class="col-8">
<form method ="POST" action="{{ route('pdf')}}">
            @csrf
            <div class="form-group">
                <label>USUARIO</label>
                <input name="name" type="name" class="form-control" placeholder="Usuario" value={{ $name }}>
            </div>
    
            <div class="form-group">
                <label>EMAIL</label>
                <input name="email" class="form-control" placeholder="email" value={{ $email }}>
            </div>
    
            <div class="form-group">
                <label>Firma</label>
                <div id="signArea">
                    <h2 class="tag-ingo">Put signature below,</h2>
                    <div class="sig sigWrapper" style="height:auto;">
                        <div class="typed"></div>
                        <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                    </div>
                </div>
            </div>

        <button id="btnSaveSign" onclick="">Save Signature</button>
    
            <div class="form-group" id="image_signature">
            </div>
            <button type="submit" class="btn btn-success">Enviar</a>

</form>
    </div>



</div>

</div>
    



    <!-- Jquery Core Js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Select Js -->
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link href="{{ asset('/css/jquery.signaturepad.css') }}" rel="stylesheet">
    <script src="{{ asset('js/numeric-1.2.6.min.js') }}"></script>
    <script src="{{ asset('js/bezier.js') }}"></script>
    <script src="{{ asset('js/jquery.signaturepad.js') }}"></script>

    <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js">
    </script>
    <script src="{{ asset('js/json2.min.js') }}"></script>


    <script>
        $(document).ready(function(e) {

            $(document).ready(function() {
                $('#signArea').signaturePad({
                    drawOnly: true,
                    drawBezierCurves: true,
                    lineTop: 90
                });
            });

            $("#btnSaveSign").click(function(e) {
                html2canvas([document.getElementById('sign-pad')], {
                    onrendered: function(canvas) {
                        var canvas_img_data = canvas.toDataURL('image/png');
                        var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/,
                            "");
                        //ajax call to save image inside folder

                        var img = document.createElement('img');
                        img.src = 'data:image/png;base64' + canvas_img_data;
                        document.getElementById("image_signature").innerHTML = '';
                        document.getElementById('image_signature').appendChild(img)
                        $.ajax({
                            url: '{{ asset('save_sign.php ') }}',
                            data: {
                                img_data: img_data
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function(response) {
                                window.location.reload();
                            }
                        });
                    }
                });
            });

        });

    </script>





@endsection
