var projHash = {};
    function initProj4js() {
      var crsSource = document.getElementById('crsSource');
      var crsDest = document.getElementById('crsDest');
      var optIndex = 0;
        //  console.log(Proj4js.defs);
      for (var def in Proj4js.defs) {
         //def="EPSG:32647";
         
         projHash[def] = new Proj4js.Proj(def);    //create a Proj for each definition
         var label = def+" - "+ (projHash[def].title ? projHash[def].title : '');
         var opt = new Option(label, def);
         crsSource.options[optIndex]= opt;
         var opt = new Option(label, def);
         crsDest.options[optIndex]= opt;
         ++optIndex;
      }  // for
      updateCrs('Source');
      updateCrs('Dest');
    }
    
    function updateCrs(id) {
      // console.log(id);
      var crs = document.getElementById('crs'+id);
      if(id=="Source"){
        // crs.value="WGS84";
        crs.value="EPSG:32647";
      }else{
        crs.value="WGS84";
        // crs.value="EPSG:32647";
      }
    } 
    function transform() {
      var crsSource = document.getElementById('crsSource');
      var projSource = null;
        //   console.log(crsSource.value);
  
      if (crsSource.value) {
        //projSource = projHash["WGS84"];
        projSource = projHash["EPSG:32647"];
      } else {
        alert("Select a source coordinate system");
        return;
      }
  
      var crsDest = document.getElementById('crsDest');
        //   console.log(crsDest.value);
      var projDest = null;
      if (crsDest.value) {
        projDest = projHash["WGS84"];
        // projDest = projHash["EPSG:32647"];
      } else {
        alert("Select a destination coordinate system");
        return;
      }
      
      var pointInputX = document.getElementById('xstart');
      var pointInputY = document.getElementById('ystart');
      var pointInput = pointInputX.value+","+pointInputY.value;
    
      if (pointInputX.value) {
        var pointSource = new Proj4js.Point(pointInput);
        var pointDest = Proj4js.transform(projSource, projDest, pointSource);
        // console.log(pointDest.x);
        document.getElementById('longstart').value = pointDest.x.toFixed(4);
        document.getElementById('latstart').value = pointDest.y.toFixed(4);
      } else {
        alert("Enter source coordinates");
        return;
      }
    }
    // ///////////////////////////////////////////////////////////
    function transformutm() {
      var crsSource = document.getElementById('crsSource');
      var projSource = null;
        //   console.log(crsSource.value);
  
      if (crsSource.value) {
        projSource = projHash["WGS84"];
       // projSource = projHash["EPSG:32647"];
      } else {
        alert("Select a source coordinate system");
        return;
      }
  
      var crsDest = document.getElementById('crsDest');
        //   console.log(crsDest.value);
      var projDest = null;
      if (crsDest.value) {
        //projDest = projHash["WGS84"];
        projDest = projHash["EPSG:32647"];
      } else {
        alert("Select a destination coordinate system");
        return;
      }
      
      var pointInputX = document.getElementById('longstart');
      var pointInputY = document.getElementById('latstart');
      var pointInput = pointInputX.value+","+pointInputY.value;
    
      if (pointInputX.value) {
        var pointSource = new Proj4js.Point(pointInput);
        var pointDest = Proj4js.transform(projSource, projDest, pointSource);
        // console.log(pointDest.x);
        document.getElementById('xstart').value = pointDest.x.toFixed(0);
        document.getElementById('ystart').value = pointDest.y.toFixed(0);
      } else {
        alert("Enter source coordinates");
        return;
      }
    }

    // ///////////////////////////////////////////////////////////
    function transformend() {
      var crsSource = document.getElementById('crsSource');
      var projSource = null;
        //   console.log(crsSource.value);
  
      if (crsSource.value) {
        projSource = projHash["EPSG:32647"];
      } else {
        alert("Select a source coordinate system");
        return;
      }
  
      var crsDest = document.getElementById('crsDest');
        //   console.log(crsDest.value);
      var projDest = null;
      if (crsDest.value) {
        projDest = projHash["WGS84"];
      } else {
        alert("Select a destination coordinate system");
        return;
      }
      
      var pointInputX = document.getElementById('xend');
      var pointInputY = document.getElementById('yend');
      var pointInput = pointInputX.value+","+pointInputY.value;
    
      if (pointInputX.value) {
        var pointSource = new Proj4js.Point(pointInput);
        var pointDest = Proj4js.transform(projSource, projDest, pointSource);
        // console.log(pointDest.x);
        document.getElementById('longend').value = pointDest.x.toFixed(4);
        document.getElementById('latend').value = pointDest.y.toFixed(4);
      } else {
        alert("Enter source coordinates");
        return;
      }
    }
    // ///////////////////////////////////////////////////////////
    function transformendutm() {
      var crsSource = document.getElementById('crsSource');
      var projSource = null;
        //   console.log(crsSource.value);
  
      if (crsSource.value) {
        projSource = projHash["WGS84"];
      } else {
        alert("Select a source coordinate system");
        return;
      }
  
      var crsDest = document.getElementById('crsDest');
        //   console.log(crsDest.value);
      var projDest = null;
      if (crsDest.value) {
        projDest = projHash["EPSG:32647"];
      } else {
        alert("Select a destination coordinate system");
        return;
      }
      
      var pointInputX = document.getElementById('longend');
      var pointInputY = document.getElementById('latend');
      var pointInput = pointInputX.value+","+pointInputY.value;
    
      if (pointInputX.value) {
        var pointSource = new Proj4js.Point(pointInput);
        var pointDest = Proj4js.transform(projSource, projDest, pointSource);
        // console.log(pointDest.x);
        document.getElementById('xend').value = pointDest.x.toFixed(0);
        document.getElementById('yend').value = pointDest.y.toFixed(0);
      } else {
        alert("Enter source coordinates");
        return;
      }
    }