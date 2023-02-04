      $(document).ready(function() {
        //Build Bubble Machines with the Bubble Engine ------------------------
        var SoapBubbleMachineNumber1 = $().BubbleEngine({
          particleSizeMin:            0,
          particleSizeMax:            60,
          particleAnimationDuration:  5000,
          particleScatteringX:        500,
          particleScatteringY:        150,
          particleDirection:          'right',
          gravity:                    -100,
          imgSource:                  'images/bubble.png'
        });
        var SoapBubbleMachineNumber2 = $().BubbleEngine({
          particleSizeMin:            0,
          particleSizeMax:            45,
          particleAnimationDuration:  2000,
          particleScatteringX:        345,
          particleScatteringY:        100,
          particleDirection:          'left',
          gravity:                    -100
        });
        //Start Bubble Machine 1 ---------------------------------------------
        SoapBubbleMachineNumber1.addBubbles(50);
        SoapBubbleMachineNumber2.addBubbles(20);


        //---------------------------------------------------------------------
        //FROM HERE IS ONLY THE DEMONSTRTION CODE FOR THE LIVECONROLS ---------
        //---------------------------------------------------------------------

        //---------------------------------------------------------------------
        //Clone Machine by clicking XXX Button -------------------------------
        //---------------------------------------------------------------------
        $('#xxx').click(function(){
          var NewID    = 'NewBubbleMachine' + Math.floor(Math.random()*10000000);
          var NewIDINT = NewID;
          $('#SoapBubbleMachineNumber1').clone().appendTo('body').attr('id', NewID);
          $('#'+NewIDINT).css({
            'top': 500,
            'left': 500            
          });
          eval(NewID = $().BubbleEngine());
          NewMachine = eval(NewID);
          NewMachine.addBubbles(50);
          $('#'+NewIDINT+' button.add').html('50');
          var offset = $('#'+NewIDINT).offset();
          NewMachine.settings(null, null, offset.left+200, offset.top, null, null, null, null, null, null);
          refreshSwatch(NewMachine);
          $('#'+NewIDINT).draggable({
            start: function() {
              $('.SoapBubbleMachine').each(function(){
                if($(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R.png');
                if($(this).find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L.png');
              });             
              MachineID = NewID;
              var ConfigValues = MachineID.getConfig();
              UpdateControls(MachineID, ConfigValues);
            },
            drag: function() {
              var offset = $(this).offset();
              //Update SoapBubbleMachine
              //NewID.settings(null, null, offset.left+200, offset.top+50, null, null, null, null, null);
              if ($(this).find('img').attr('src') == 'images/Bubble-Machine-R.png' || $(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') {
                $(this).find('img').attr('src', 'images/Bubble-Machine-R-hover.png');
                NewID.settings(null, null, offset.left+$('#SoapBubbleMachineNumber1').width()-40, offset.top+50, null, null, null, null, 'right', null);
              } else {
                $(this).find('img').attr('src', 'images/Bubble-Machine-L-hover.png');
                NewID.settings(null, null, offset.left+20, offset.top+50, null, null, null, null, 'left', null);
              }
            }
          });   
          $('#'+NewIDINT).click(function(){
              //Update Control Panel
              MachineID = NewID;
              //Select ITEM
              $('.SoapBubbleMachine').each(function(){
                if($(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R.png');
                if($(this).find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L.png');
              });             
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-R.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R-hover.png');
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-L.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L-hover.png');
              
              var ConfigValues = MachineID.getConfig();
              UpdateControls(MachineID, ConfigValues);
          }); 
          $('#'+NewIDINT+' button.add').click(function(){
            NewID.addBubbles(20);
            $('#'+NewIDINT+' button.add').html(NewID.getCounter());
          });
          $('#'+NewIDINT+' button.remove').click(function(){
            NewID.removeBubbles();
            $('#'+NewIDINT+' button.add').html(NewID.getCounter());
          });
          $('#'+NewIDINT+' button.direction').click(function(){
            var offset = $(this).parent().offset();
            if ($(this).parent().find('img').attr('src') == 'images/Bubble-Machine-L.png' || $(this).parent().find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') {
              $(this).parent().find('img').attr('src', 'images/Bubble-Machine-R.png');
              NewID.settings(null, null, offset.left+$('#SoapBubbleMachineNumber1').width()-40, offset.top+50, null, null, null, null, 'right', null);
              $(this).html('< Turn Left');
            } else {
              $(this).parent().find('img').attr('src', 'images/Bubble-Machine-L.png');
              NewID.settings(null, null, offset.left+20, offset.top+50, null, null, null, null, 'left', null);
              $(this).html('Turn Right >');
            }
          });
          //Activate New Machine
          MachineID = NewID;
          //Select ITEM
          $('.SoapBubbleMachine').each(function(){
            if($(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R.png');
            if($(this).find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L.png');
          });             
          if($('#'+NewIDINT).find('img').attr('src') == 'images/Bubble-Machine-R.png') $('#'+NewIDINT).find('img').attr('src', 'images/Bubble-Machine-R-hover.png');
          if($('#'+NewIDINT).find('img').attr('src') == 'images/Bubble-Machine-L.png') $('#'+NewIDINT).find('img').attr('src', 'images/Bubble-Machine-L-hover.png');
          
          var ConfigValues = MachineID.getConfig();
          UpdateControls(MachineID, ConfigValues);
          
        });      
              





              
        //Helper Function - Bubble Machine Buttons ---------------------------
        $('.SoapBubbleMachine button.remove').click(function(){
          MachineID = eval($(this).parent().attr('id'));
          MachineID.removeBubbles();
          $(this).parent().find('button.add').html(MachineID.getCounter());
        });
        $('.SoapBubbleMachine button.add').click(function(){
          MachineID = eval($(this).parent().attr('id'));
          MachineID.addBubbles(20);
          $(this).html(MachineID.getCounter());
        });
        $('.SoapBubbleMachine button.direction').click(function(){
          var offset = $(this).parent().offset();
          MachineID = eval($(this).parent().attr('id'));
          if ($(this).parent().find('img').attr('src') == 'images/Bubble-Machine-L.png' || $(this).parent().find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') {
            $(this).parent().find('img').attr('src', 'images/Bubble-Machine-R.png');
            MachineID.settings(null, null, offset.left+$('#SoapBubbleMachineNumber1').width()-40, offset.top+50, null, null, null, null, 'right', null);
            $(this).html('< Turn Left');
          } else {
            $(this).parent().find('img').attr('src', 'images/Bubble-Machine-L.png');
            MachineID.settings(null, null, offset.left+20, offset.top+50, null, null, null, null, 'left', null);
            $(this).html('Turn Right >');
          }
        });

        //---------------------------------------------------------------------
        $(".SoapBubbleMachine").click(function(){
            //Update Control Panel
            MachineID = eval($(this).attr('id'));
            //Select ITEM
            $('.SoapBubbleMachine').each(function(){
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R.png');
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L.png');
            });             
            if($(this).find('img').attr('src') == 'images/Bubble-Machine-R.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R-hover.png');
            if($(this).find('img').attr('src') == 'images/Bubble-Machine-L.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L-hover.png');
            
            var ConfigValues = MachineID.getConfig();
            UpdateControls(MachineID, ConfigValues);
        });
        
        $(".SoapBubbleMachine").draggable({
          start: function() {
            $('.SoapBubbleMachine').each(function(){
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-R.png');
              if($(this).find('img').attr('src') == 'images/Bubble-Machine-L-hover.png') $(this).find('img').attr('src', 'images/Bubble-Machine-L.png');
            });             
            MachineID = eval($(this).attr('id'));
            var ConfigValues = MachineID.getConfig();
            UpdateControls(MachineID, ConfigValues);
          },
          drag: function() {
            var offset = $(this).offset();
            //Update SoapBubbleMachine
            MachineID = eval($(this).attr('id'));
            if ($(this).find('img').attr('src') == 'images/Bubble-Machine-R.png' || $(this).find('img').attr('src') == 'images/Bubble-Machine-R-hover.png') {
              $(this).find('img').attr('src', 'images/Bubble-Machine-R-hover.png');
              MachineID.settings(null, null, offset.left+$('#SoapBubbleMachineNumber1').width()-40, offset.top+50, null, null, null, null, 'right', null);
            } else {
              $(this).find('img').attr('src', 'images/Bubble-Machine-L-hover.png');
              MachineID.settings(null, null, offset.left+20, offset.top+50, null, null, null, null, 'left', null);
            }
          }
        });

        $("#control").draggable({
          handle: '#header'
        });



        //---------------------------------------------------------------------
        //INIT  ---------------------------------------------------------------
        //---------------------------------------------------------------------

        //Init Bubble Machines -----------------------------------------------
        offset = $('#SoapBubbleMachineNumber1').offset();
        SoapBubbleMachineNumber1.settings(null, null, offset.left+$('#SoapBubbleMachineNumber1').width()-40, offset.top+50, null, null, null, null, null, null);
        offset = $('#SoapBubbleMachineNumber2').offset();
        SoapBubbleMachineNumber2.settings(null, null, offset.left+20, offset.top+50, null, null, null, null, null, null);

        //Init Control Panel --------------------------------------------------
        var ConfigValues = SoapBubbleMachineNumber1.getConfig();
        UpdateControls(SoapBubbleMachineNumber1, ConfigValues);
        refreshSwatch(SoapBubbleMachineNumber1);
      });
      //Helper Function - Update active Bubble Engine -----------------------
      function refreshSwatch(MachineID) {
        var particleSizeMin          = $("#particleSizeMinMax").slider("values", 0)
          ,particleSizeMax           = $("#particleSizeMinMax").slider("values", 1)
          ,particleAnimationDuration = $("#particleAnimationDuration").slider("value")
          ,particleScatteringX       = $("#particleScatteringX").slider("value")
          ,particleScatteringY       = $("#particleScatteringY").slider("value");

        //Update Info Labels
        $("#Info_particleSizeMinMax").html(       'Bubble Size: '+$("#particleSizeMinMax").slider("values", 0)+ ' - ' +$("#particleSizeMinMax").slider("values", 1));
        $("#Info_particleAnimationDuration").html('Bubble Livetime: '    +$("#particleAnimationDuration").slider("value"));
        $("#Info_particleScatteringX").html(      'Scattering X: '       +$("#particleScatteringX"      ).slider("value"));
        $("#Info_particleScatteringY").html(      'Scattering Y: '       +$("#particleScatteringY"      ).slider("value"));
        //Update SoapBubbleMachine
        MachineID.settings(particleSizeMin, particleSizeMax, null, null, particleAnimationDuration, null, particleScatteringX, particleScatteringY, null, null);
      }

      //Helper Function - Update Control Panel to active Bubble Machine ----
      function UpdateControls(Machine, ConfigValues) {
        $("#particleSizeMinMax").slider({
          slide: function() {refreshSwatch(Machine)},
          change: function() {refreshSwatch(Machine)},
          range: true,
          min: 0,
          max: 200,
          values: [ConfigValues[0], ConfigValues[1]]
        });
        $("#particleAnimationDuration, #particleScatteringX, #particleScatteringY").slider({
          slide: function() {refreshSwatch(Machine)},
          change: function() {refreshSwatch(Machine)},
          orientation: 'horizontal',
          range: "min",
          min: 0
        });
        $("#particleAnimationDuration").slider({
          max: 10000,
          value: ConfigValues[2]
        });
        $("#particleScatteringX").slider({
          max: 1000,
          value: ConfigValues[3]
        });
        $("#particleScatteringY").slider({
          max: 1000,
          value: ConfigValues[4]
        });
        $('#icon1').unbind('click').click(function(){
          Machine.settings(null, null, null, null, null, null, null, null, null, 'images/heart.png');
        });
        $('#icon2').unbind('click').click(function(){
          Machine.settings(null, null, null, null, null, null, null, null, null, 'images/bubble.png');
        });
        $('#icon3').unbind('click').click(function(){
          Machine.settings(null, null, null, null, null, null, null, null, null, 'images/twitter.png');
        });
      }