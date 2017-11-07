var Spry;if(!Spry)Spry={};if(!Spry.Widget)Spry.Widget={};Spry.Widget.ValidationSelect=function(element,opts)
{this.init(element);Spry.Widget.Utils.setOptions(this,opts);var validateOn=['submit'].concat(this.validateOn||[]);validateOn=validateOn.join(",");this.validateOn=0|(validateOn.indexOf('submit')!=-1?Spry.Widget.ValidationSelect.ONSUBMIT:0);this.validateOn=this.validateOn|(validateOn.indexOf('blur')!=-1?Spry.Widget.ValidationSelect.ONBLUR:0);this.validateOn=this.validateOn|(validateOn.indexOf('change')!=-1?Spry.Widget.ValidationSelect.ONCHANGE:0);if(this.additionalError)
this.additionalError=this.getElement(this.additionalError);if(Spry.Widget.ValidationSelect.onloadDidFire)
this.attachBehaviors();else
Spry.Widget.ValidationSelect.loadQueue.push(this);};Spry.Widget.ValidationSelect.ONCHANGE=1;Spry.Widget.ValidationSelect.ONBLUR=2;Spry.Widget.ValidationSelect.ONSUBMIT=4;Spry.Widget.ValidationSelect.prototype.init=function(element)
{this.element=this.getElement(element);this.additionalError=false;this.selectElement=null;this.form=null;this.event_handlers=[];this.requiredClass="selectRequiredState";this.invalidClass="selectInvalidState";this.focusClass="selectFocusState";this.validClass="selectValidState";this.emptyValue="";this.invalidValue=null;this.isRequired=true;this.validateOn=["submit"];this.validatedByOnChangeEvent=false;};Spry.Widget.ValidationSelect.prototype.destroy=function(){if(this.event_handlers)
for(var i=0;i<this.event_handlers.length;i++){Spry.Widget.Utils.removeEventListener(this.event_handlers[i][0],this.event_handlers[i][1],this.event_handlers[i][2],false);}
try{delete this.element;}catch(err){}
try{delete this.selectElement;}catch(err){}
try{delete this.form;}catch(err){}
try{delete this.event_handlers;}catch(err){}
var q=Spry.Widget.Form.onSubmitWidgetQueue;var qlen=q.length;for(var i=0;i<qlen;i++){if(q[i]==this){q.splice(i,1);break;}}};Spry.Widget.ValidationSelect.onloadDidFire=false;Spry.Widget.ValidationSelect.loadQueue=[];Spry.Widget.ValidationSelect.prototype.getElement=function(ele)
{if(ele&&typeof ele=="string")
return document.getElementById(ele);return ele;};Spry.Widget.ValidationSelect.processLoadQueue=function(handler)
{Spry.Widget.ValidationSelect.onloadDidFire=true;var q=Spry.Widget.ValidationSelect.loadQueue;var qlen=q.length;for(var i=0;i<qlen;i++)
q[i].attachBehaviors();};Spry.Widget.ValidationSelect.addLoadListener=function(handler)
{if(typeof window.addEventListener!='undefined')