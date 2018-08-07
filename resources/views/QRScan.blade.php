@extends ('layouts.main')
@section('page_heading','QR Scan')

@section('section')
<script type="text/javascript" src="{{ asset('js/qrcode.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/qr.js') }}"></script>
<meta name="_token" content="{{ csrf_token() }}">
    
<div class="col-md-12" >
    <div class="box box-primary" id="main">
        <div class="box-body" id="mainbody">
         
           <table class="tsel container-fluid jumbotron panel mx-auto text-center" width="100%" border="0" >
                
                <tr>
                    <td colspan="2" align="center">
                        <hr>
                        <div id="outdiv" >
                          <video id="v" autoplay="autoplay"></video>
                         </div>
                         <hr>
                     </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                     Result: <span id="result">scan</span>
                    </td>
                </tr>
                <tr>
                    <td class="row container panel opag mx-auto text-center">
                     <BUTTON  id="webcamimg" onclick="setwebcam()" 
                                    >Rescan</BUTTON>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="col-xs-12 container-fluid jumbotron panel text-center"><i class="fa fa-qrcode" aria-hidden="true" id="qrcode-icon" style="display: none"><input type="file" accept="image/*" id="file-input" class="form-control-file col-xs-10 pull-right"  capture="environment" style="display: none"></i>
                        </span>
                        
                    </td>
                </tr>
            </table> 
                    <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
                @if(session()->has('sidebarProjectSelectedResponsePID'))
                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }} container-fluid jumbotron panel">
                        <label for="project_id" class="col-md-4 control-label">Project Name</label>
                        <div class="col-md-6">
                            <select id="project_id" name ="project_id" class="form-control" onchange="load();authoQRScanPS();">
                               <script type="text/javascript"> 
                                $(document).ready(function() {
                                        if (isMobile) {
                                            loadMobile();
                                        }else{
                                            load(); 
                                        }
                                        authoQRScanPS();
                                    });
                               </script>
                                <option value=" {{ session()->get('sidebarProjectSelectedResponsePID') }} ">{{session()->get('sidebarProjectSelectedResponseCP')}}</option>
                               
                            </select>
                            <span id="project_id_error" class="form-group has-error help-block"></span>
                            @if ($errors->has('project_id'))
                                <span class="help-block"><strong>{{ $errors->first('project_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                @endif
                  
             
    </div>
    <canvas id="qr-canvas" width="800" height="600" style="width: 320px;  height: 240px; display:none;" ></canvas>
    
    <script type="text/javascript">load();</script>
</div>
</div>
@stop