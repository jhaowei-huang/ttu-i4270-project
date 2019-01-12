!function(e){var n={};function t(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,t),r.l=!0,r.exports}t.m=e,t.c=n,t.d=function(e,n,o){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:o})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(t.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var r in e)t.d(o,r,function(n){return e[n]}.bind(null,r));return o},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="/",t(t.s=61)}({61:function(e,n,t){e.exports=t(62)},62:function(e,n){var t={"keynote-1":{index:1,date:"9/26(三)",time:"10:30~11:15",agenda:"Driving Outdoor Industry Progress Through Collaboration",speaker:"Mr. David Ekelund<br>CEO, Icebug & Chairman of the board, Scandinavian Outdoor Group(瑞典)",food:!1,checked:!1},"keynote-2":{index:2,date:"9/26(三)",time:"11:15~12:00",agenda:"Biotechnology Routes to Advanced Fibers in Textiles and Fabric Discovery in USA",speaker:"Dr. Melik Demirel<br>Full Professor, College of Engineering &Director, Center for Research on Advanced Fiber Technologies, Engineering Science and Mechanics, Pennsylvania State University (美國)",food:!0,checked:!1},"keynote-3":{index:3,date:"9/26(三)",time:"13:30~14:15",agenda:"Building New Business Ecosystem Around Textile Recycling",speaker:"Dr. Pirjo Heikkilä<br>Senior Scientist, VTT Technical Research Centre of Finland Ltd(芬蘭)",food:!1,checked:!1},"keynote-4":{index:4,date:"9/26(三)",time:"14:15~15:00",agenda:"Value Chain Transparency for Impact",speaker:"Mr. Jason Kibbey<br>CEO, Sustainable Apparel Coalition(美國)",food:!1,checked:!1},"keynote-5":{index:5,date:"9/26(三)",time:"15:20~16:05",agenda:"Fibersort – Automated Sorting of Post Consumer Textiles for High Value Recycling",speaker:"Ms. Traci Kinden<br>Project Manager of Textiles Programme, Circular Economy(荷蘭)",food:!1,checked:!1},"keynote-6":{index:6,date:"9/27(四)",time:"09:00~09:45",agenda:"Intelligent Functional Textiles Created by the Application of Macro-encapsulated Phase Change Material",speaker:"Dr. Barbara Pause<br>President of Textile Testing & Innovation, LLC (美國)",food:!1,checked:!1},"keynote-7":{index:7,date:"9/27(四)",time:"09:45~10:30",agenda:"The Role of Conductive Fibres in Accelerating the Transformation of the Functional Fibre Industry",speaker:"Dr. Joselito Razal<br>Deputy Director of the Australian Research Council Research Hub for Future Fibres and an Associate Professor at the Institute for Frontier Materials, Deakin University (澳洲)",food:!1,checked:!1},"keynote-8":{index:8,date:"9/27(四)",time:"10:45~11:30",agenda:"Nanotechnology, a Key Enabling Technology to Functional and Smart Textiles",speaker:"Mr. Braz Costa<br>CEO, Center for Nanotechnology and Smart Materials (葡萄牙)",food:!0,checked:!1},"keynote-9":{index:9,date:"9/27(四)",time:"14:15~15:00",agenda:"Canada’s Wearables Industry: Challenges and Opportunities",speaker:"Mr. Peter Kallai<br>CEO, intelliFLEX (加拿大)",food:!1,checked:!1},"keynote-10":{index:10,date:"9/27(四)",time:"14:15~15:00",agenda:"Smart Textiles: Disrupting the Textiles Industry and Beyond",speaker:"Mr. Ben Cooper<br>Managing Director, IoClothes (美國)",food:!1,checked:!1},"keynote-11":{index:11,date:"9/27(四)",time:"15:20~16:05",agenda:"Taking E-Textiles From Concept to Mass Production – How IPC International Standards for E-Textiles Will Reduce Costs, Accelerate Innovation and Improve Reliability",speaker:"Mr. Chris Jorgensen<br>Director of Technology Transfer, IPC-Association Connecting Electronics Industries (美國)",food:!1,checked:!1}},o={};$(document).ready(function(){for(var e=$(".keynote"),n={},r=0;r<11;r++){var a=e.clone(),i="keynote-"+(r+1);a.attr("id","keynote-step1-"+(r+1)),a.find(".column-index").html(t[i].index),a.find(".column-date").html(t[i].date),a.find(".column-time").html(t[i].time),a.find(".column-agenda").html(t[i].agenda),a.find(".column-speaker").html(t[i].speaker),n[r]=a,a.insertBefore(e)}e.remove(),$(".indicator .btn").on("click",function(e){var n=e.target.id;$(".indicator .btn").removeClass("active"),$("#"+n).addClass("active");var t=n.replace("btn-","");$(".step").css("display","none"),$("#"+t).css("display","block")}),$("#btn-step1").trigger("click");var d=0,c=0;$("input.select").on("click",function(n){var r=$(n.target),a=r.parents(".keynote").attr("id").replace("step1","step2"),i=a.replace("step2-","");r.is(":checked")?(o[t[i].index]=r.parents(".keynote").clone(),o[t[i].index].attr("id",a),t[i].checked=!0,d+=1,c+=t[i].food?1:0):(o[t[i].index].remove(),delete o[t[i].index],t[i].checked=!1,d+=-1,c+=t[i].food?-1:0),$("#chosen-keynote-number").text(d),$("#chosen-food-number").text(c),e=$(".keynote-food");for(var s=function(n){null!=o[n]&&(o[n].insertBefore(e),t["keynote-"+n].food?(o[n].find(".column-select").html('<button id="btn-foodChosen-keynote-'+n+'"class="btn btn-outline-primary btn-sm" type="button">\n不需要</button>'),t["keynote-"+n].foodChosen=0,$("#btn-foodChosen-keynote-"+n).on("click",function(){t["keynote-"+n].foodChosen+=1,t["keynote-"+n].foodChosen%=3;t["keynote-"+n].foodChosen})):o[n].find(".column-select").html("不提供"),console.log())},l=1;l<=11;l++)s(l)})})}});