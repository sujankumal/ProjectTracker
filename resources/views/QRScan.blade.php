@extends ('layouts.dashboard')
@section('page_heading','QR Scan')

@section('section')
<script type="text/javascript" src="{{ asset('js/qrcode.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/qr.js') }}"></script>
<meta name="_token" content="{{ csrf_token() }}">
<div id="main">
        <div id="mainbody" style="display: inline;">
            <table class="tsel" width="100%" border="0">
            <tbody>
            <tr>
                <td width="50%" valign="top" align="center">
                    <table class="tsel" border="0">
                        <tbody>
                        <tr>
                        <td>
                        <BUTTON class="selector" id="webcamimg" onclick="setwebcam()" 
                        	style="opacity: 1;" 
                            align="left" >Rescan</BUTTON>
                        </td>
                        
                        </tr>
                         <tr>
                             <td colspan="2" align="center">
                                 <div id="outdiv" style="width: 320px;
                                 height: 240px;">
                                     <video id="v"  autoplay="autoplay" ></video>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
             </td>
             </tr>
             <tr>
                 <td colspan="3" align="center">
                     <div id="result">- scanning -</div>
                    </td>
                </tr>
            </tbody>
        </table> 
                    <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
                @if(session()->has('sidebarProjectSelectedResponsePID'))
                    
                    <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                    <label for="project_id" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <select id="project_id" name ="project_id" class="form-control" onchange="load();authoQRScanPS();">
                           <script type="text/javascript"> 
                            $(document).ready(function() {
                                    load();
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
    <canvas id="qr-canvas" width="800" height="600" style="width: 320px;  height: 240px; display:none;"></canvas>
    <script type="text/javascript">load();</script>


@stop