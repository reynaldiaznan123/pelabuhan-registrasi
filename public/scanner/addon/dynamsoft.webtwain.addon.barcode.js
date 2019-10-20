/*!
* Dynamsoft JavaScript Library
* Product: Dynamsoft Web Twain
* Web Site: http://www.dynamsoft.com
*
* Copyright 2016, Dynamsoft Corporation 
* Author: Dynamsoft R&D Department
*
* Version: 11.3.2
*
* Module: addon/barcode
* final js: build\addon\dynamsoft.webtwain.addon.barcode.js
*/
;Dynamsoft.BarcodeVersion="4.2.0.401";Dynamsoft.BarcodeMacVersion="2016,3,25,10,23";var EnumDWT_BarcodeFormat={All:183806,OneD:180702,CODABAR:2,CODE_39:4,CODE_93:8,CODE_128:16,EAN_8:64,EAN_13:128,ITF:256,UPC_A:16384,UPC_E:32768,INDUSTRIAL_25:131072,QR_CODE:2048,PDF417:1024,DATAMATRIX:32};(function(a){function b(){var c=this;c._errorCode=0;c._errorString="";c._Count=0;c._resultlist=[]}b.prototype.GetErrorCode=function(){var c=this;return c._errorCode};b.prototype.GetErrorString=function(){var c=this;return c._errorString};b.prototype.GetCount=function(){var c=this;return c._Count};b.prototype.GetContent=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetContent");return""}return e._resultlist[d].content};b.prototype.GetFormat=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetFormat");return""}return e._resultlist[d].format};b.prototype.GetContentType=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetContentType");return""}return e._resultlist[d].contentType};b.prototype.GetX1=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetX1");return""}return e._resultlist[d].point[0]};b.prototype.GetX2=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetX2");return""}return e._resultlist[d].point[2]};b.prototype.GetX3=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetX3");return""}return e._resultlist[d].point[4]};b.prototype.GetX4=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetX4");return""}return e._resultlist[d].point[6]};b.prototype.GetY1=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetY1");return""}return e._resultlist[d].point[1]};b.prototype.GetY2=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetY2");return""}return e._resultlist[d].point[3]};b.prototype.GetY3=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetY3");return""}return e._resultlist[d].point[5]};b.prototype.GetY4=function(d){var e=this,c=e._resultlist.length;if(e._errorCode<0){return""}if(d>=c||d<0){Dynamsoft.Lib.Errors.BarCode_InvalidIndex(e,"GetY4");return""}return e._resultlist[d].point[7]};a.NewBarcodeResult=function(){return new b()}})(Dynamsoft.Lib);(function(b){if(!b.product.bChromeEdition){return}function c(d){var e=b.html5.Funs;d.__innerBarcodeReadFunction=function(f,h,i,j,g){var k=this;if(!b.isFunction(j)){return k.__innerBarcodeSyncReadFunction(f,i)}else{return k.__innerBarcodeAsyncReadFunction(f,h,i,j,g)}};d.__innerBarcodeAsyncReadFunction=function(f,i,k,l,h){var n=this;var g=function(m){if(m.exception==0){if(b.isFunction(l)){l(i,n.__innerGetBarcodeResultAsyncFunction(m))}}else{if(b.isFunction(h)){h(m.exception,m.description)}}e.hideMask(f)},j=function(m){e.hideMask(f)};e.showMask(f);n._innerSend(f,k,true,g,j);return true};d.__innerBarcodeSyncReadFunction=function(g,i){var j=this,h,f;h=j._innerFunRaw(g,i,false,false);f=b.NewBarcodeResult();f._errorCode=j._errorCode;f._errorString=j._errorString;if(h&&b.isArray(h)){f._resultlist=h;f._Count=h.length}return f}}var a=function(e){var f=b.html5.Funs,d;c(e);d={Barcode:{Read:function(i,j,g,h){return e.__innerBarcodeReadFunction("ReadBarcode",i,f.makeParams(i,0,0,0,0,j),g,h)},ReadRect:function(k,n,m,j,h,l,g,i){return e.__innerBarcodeReadFunction("ReadBarcode",k,f.makeParams(k,n,m,j,h,l),g,i)},GetLocalVersion:function(){return e._innerFun("BarcodeVersion")},Download:function(l,o,h){var k=e,m;b.cancelFrome=2;var j=function(){if(b.isFunction(o)){o()}return true},p=function(){if(b.isFunction(h)){h(k.ErrorCode,k.ErrorString)}return false};var g=e._innerFun("BarcodeVersion");if(b.env.bMac&&g==Dynamsoft.BarcodeMacVersion){j();return true}else{if(g==Dynamsoft.BarcodeVersion){j();return true}}if(!l||l==""){b.Errors.BarCode_InvalidRemoteFilename(k);p();return false}if(f.isServerInvalid(k)){p();return false}m="get";b.showProgress(k,"Download",true);var n=function(q){var r=(q.total===0)?100:Math.round(q.loaded*100/q.total),s=[q.loaded," / ",q.total].join("");k._OnPercentDone([0,r,"","http"])},i=true;k._OnPercentDone([0,-1,"HTTP Downloading...","http"]);if(!b.isFunction(o)){i=false}return f.loadHttpBlob(k,m,l,i,function(q){k._OnPercentDone([0,-1,"Loading..."]);var r=100;k.__LoadImageFromBytes(q,r,"",i,j,p)},function(){b.closeProgress("Download");p()},n)}}};e.__addon=e.__addon||{};b.mix(e.__addon,d)};b.DynamicLoadAddonFuns.push(a)})(Dynamsoft.Lib);(function(b){if(!b.product.bPluginEdition&&!b.product.bActiveXEdition){return}var a=function(e){var d=false,f,c;if(e.getSWebTwain()&&e.getSWebTwain().Addon){d=true}if(!d){return false}f=e.getSWebTwain().Addon.Barcode;c={Barcode:{Read:function(i,j,g,h){if(b.isFunction(g)){f.ReadAsync(i,j,function(l,k){if(k.GetErrorCode()!=0){h(k.GetErrorCode(),k.GetErrorString())}else{g(l,k)}});return null}else{return f.Read(i,j)}},ReadRect:function(k,n,m,j,h,l,g,i){if(b.isFunction(g)){f.ReadRectAsync(k,n,m,j,h,l,function(p,o){if(o.GetErrorCode()!=0){i(o.GetErrorCode(),o.GetErrorString())}else{g(p,o)}});return null}else{return f.ReadRect(k,n,m,j,h,l)}},GetLocalVersion:function(){return f.GetLocalVersion()},Download:function(k,g,i){var j=f.GetLocalVersion();if(j==Dynamsoft.BarcodeVersion){if(Dynamsoft.Lib.isFunction(g)){g()}return true}var h=f.Download(k);return b.wrapperRet(e,h,g,i)}}};e.Addon=e.Addon||{};b.mix(e.Addon,c)};b.DynamicLoadAddonFuns.push(a)})(Dynamsoft.Lib);
