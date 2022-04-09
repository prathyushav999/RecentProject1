window.onload = function () {
  OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.ana);

  OrgChart.templates.myTemplate.size = [125, 170];
  OrgChart.templates.myTemplate.node = '<rect x="0" y="0" height="170" width="125" fill="#ffffff" stroke-width="1" stroke="#aeaeae" rx="5" ry="5"></rect>';

  OrgChart.templates.myTemplate.field_0 = '<text width="100" text-overflow="multiline" style="font-size: 24px;font-weight: bold;" fill="#2D2D2D" x="62.5" y="85" text-anchor="middle">{val}</text>';
  OrgChart.templates.myTemplate.field_1 = '<text width="110" text-overflow="multiline"  style="font-size: 14px;" fill="#2D2D2D" x="62.5" y="132" text-anchor="middle">{val}</text>';

  OrgChart.templates.myTemplate.img_0 = '<clipPath id="{randId}"><circle cx="60" cy="37" r="30"></circle></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="30" y="7"  width="60" height="60"></image>';


  OrgChart.templates.myTemplate.plus = '<circle cx="15" cy="15" r="15" fill="#000000" stroke="#000000" stroke-width="1"></circle>'
    + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#ffffff"></line>'
    + '<line x1="15" y1="4" x2="15" y2="26" stroke-width="1" stroke="#ffffff"></line>';
  OrgChart.templates.myTemplate.minus = '<circle cx="15" cy="15" r="15" fill="#37D8BF" stroke="#ffffff" stroke-width="1"></circle>'
    + '<line x1="4" y1="15" x2="26" y2="15" stroke-width="1" stroke="#ffffff"></line>';



  var editForm = function () {
    this.nodeId = null;
  };

  editForm.prototype.init = function (obj) {
    var that = this;
    this.obj = obj;
    this.editForm = document.getElementById("editForm");
    this.emailInput = document.getElementById("email");
    this.addressInput = document.getElementById("address");
    this.phone1Input = document.getElementById("phone1");
    this.phone2Input = document.getElementById("phone2");
    this.imgInput = document.getElementById("img");
    this.nameInput = document.getElementById("name");
    this.titleInput = document.getElementById("title");
    this.cancelButton = document.getElementById("close");

    this.cancelButton.addEventListener("click", function () {
      that.hide();
    });
  };


  editForm.prototype.show = function (nodeId) {
    this.nodeId = nodeId;

    var left = document.body.offsetWidth / 2 - 150;

    this.editForm.style.left = left + "px";
    var node = chart.get(nodeId);
    if (!node) return;
    this.emailInput.innerHTML = node.email ? node.email : "";
    this.addressInput.innerHTML = node.address ? node.address : "";
    this.phone1Input.innerHTML = node.phone1 ? node.phone1 : "";
    this.phone2Input.innerHTML = node.phone2 ? node.phone2 : "";
    this.imgInput.src = node.img ? node.img : "#";
    this.nameInput.innerHTML = node.name ? node.name : "";
    this.titleInput.innerHTML = node.title ? node.title : "";

    this.editForm.style.display = "block";

    OrgChart.anim(this.editForm, { opacity: 0 }, { opacity: 1 }, 300, OrgChart.anim.inOutSin);
  };

  editForm.prototype.hide = function (showldUpdateTheNode) {
    this.editForm.style.display = "none";
    this.editForm.style.opacity = 0;

  };



  var chart = new OrgChart(document.getElementById('tree'), {
      template: "myTemplate",
     // nodeMouseClick: OrgChart.action.none,
      mouseScrool: OrgChart.action.scroll,
      align: OrgChart.ORIENTATION,
      enableSearch: false,
      showXScroll: OrgChart.none,
      toolbar: {
          zoom: true,
          fit: true,
          expandAll: false
      },
      collapse: {
          level: 3,
          allChildren: true
      },
      nodeBinding: {
    	  field_0: "name",
          field_1: 'title',
          img_0: "img"
         // field_number_children: "field_number_children"
      },
      /*  nodes: nodes*/

  /*  toolbar: {
      zoom: true,
    },
    enableSearch: false,
    template: "myTemplate",
    nodeBinding: {
      field_0: "name",
      field_1: 'title',
      img_0: "img"
    },*/
    editUI: new editForm()
  });


let res;
	data();
	function data(){
    const xhttp = new XMLHttpRequest();
    	  xhttp.onload = function() {
    		 res=this.responseText;
    		 //alert(res);
    		 customerid=this.responseText;

    		 return customerid;
    	  }

    	  xhttp.open("POST", "treeData.php",false);
    	  xhttp.setRequestHeader("Content-Type", "application/json");
    	  var queryString = new Array();
    	
    	        if (queryString.length == 0) {
    	            if (window.location.search.split('?').length > 1) {
    	                var params = window.location.search.split('?')[1].split('&');
    	                for (var i = 0; i < params.length; i++) {
    	                    var key = params[i].split('=')[0];
    	                    var value = decodeURIComponent(params[i].split('=')[1]);
    	                    queryString[key] = value;
    	                }
    	            }
    	        }
    	        var customerId =""
    	        if (queryString["customerId"] != null){
    	        	id=queryString["customerId"];
    	        }
    	  
    	  var data = {id:id};
    	  xhttp.send(JSON.stringify(data));


    	}
	function redirect(){
		
		 var queryString = new Array();
	    	
	        if (queryString.length == 0) {
	            if (window.location.search.split('?').length > 1) {
	                var params = window.location.search.split('?')[1].split('&');
	                for (var i = 0; i < params.length; i++) {
	                    var key = params[i].split('=')[0];
	                    var value = decodeURIComponent(params[i].split('=')[1]);
	                    queryString[key] = value;
	                }
	            }
	        }
	        var customerId =""
	        if (queryString["customerId"] != null){
	        	 const url = "http://localhost/crud/template.html?customerId="+customerId;
			        window.location.href = url;
				 return ;
	        }
	  
	}
 	res="["+res+"]";
//alert("start");
//var params = '[{"domain":"Abcd-E-Group","domaintype":"com","Submit1":"Search"}]';
//obj = JSON.parse(params);
//alert(obj);
var res2=JSON.parse(res);
/*alert("res2");
alert(res2);
alert(typeof res2);
//
       //chart.load(res.toString());
alert("map2")
alert(typeof map2)
//
//
alert(typeof obj);
alert(typeof res);*/
chart.load(res2);


/*chart.load([
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "3",
    "name": "Chandu",
    "title": "3"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "3",
    "name": "Chandu",
    "title": "3"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "11",
    "name": "prathyusha",
    "pid": "3",
    "title": "SREA-11"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "12",
    "name": "Prathyusha",
    "pid": "3",
    "title": "SREA-12"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "13",
    "name": "yaswanth",
    "pid": "3",
    "title": "SREA-13"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "5",
    "name": "yashu56",
    "pid": "3",
    "title": "SREA-5"
  },
  {
    "img": "https://cdn.balkan.app/shared/5.jpg",
    "id": "21",
    "name": "chandrika",
    "pid": "5",
    "title": "SREA-21"
  }
]);*/

/*chart.load([
    {
      id: "1",
      name: "Endy Chau",
      title: "CEO",
      img: "https://cdn.balkan.app/shared/2.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"
    },

    {
      id: 2,
      pid: 1,
      name: "yashu",
      title: "Senior manager, IT Operations",
      img: "https://cdn.balkan.app/shared/4.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    },
    {
      id: 3,
      pid: 1,
      name: "Eason Lee",
      title: "Senior manager, Information Arhitecture",
      img: "https://cdn.balkan.app/shared/5.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    },
    {
      id: 4,
      pid: 1,
      name: "Chun Wa",
      title: "Senior manager, IT Systems",
      img: "https://cdn.balkan.app/shared/6.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    },
    {
      id: 5,
      pid: 1,
      name: "P L Ip",
      title: "Manager HR, Managaer",
      img: "https://cdn.balkan.app/shared/7.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    },
    {
      id: 6,
      pid: 4,
      tags: ["Directors"],
      name: "Name 1",
      title: "Title 1",
      img: "https://cdn.balkan.app/shared/8.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    },
    {
      id: 7,
      pid: 4,
      tags: ["Directors"],
      name: "Name 2",
      title: "Title 2",
      img: "https://cdn.balkan.app/shared/9.jpg",
      email: "my@email.com",
      phone1: "+6465 6454 8787",
      phone2: "+2342 3433 5455",
      address: "T2"

    }
  ]);*/
};