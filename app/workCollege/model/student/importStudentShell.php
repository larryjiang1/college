<?php
/*=============================================================================
#     FileName: importStudentShell.php
#         Desc: 导入学员
#       Author: Wuyuanhang
#        Email: QQ:554119220
#   LastChange: 2016-10-26 21:54:44
#      History:
#      Paramer:
=============================================================================*/

class importStudentShell extends worker {
    function __construct($options) {
        parent::__construct($options, '50020101');
    }
    function run() {
        $mobile = array(
'18573528555',
'15061629797',
'15185128088',
'18674662237',
'13840839966',
'13421280322',
'15907461585',
'15185972400',
'13625880286',
'13349394313',
'13958992588',
'1147122963',
'17308492892',
'17753255333',
'13798278989',
'18990888812',
'15365766658',
'13809809666',
'18974633156',
'13421208478',
'13757818103',
'13945970678',
'13707981967',
'15123299511',
'15774108888',
'13439611869',
'18274651056',
'18075822077',
'13621465456',
'18990763688',
'13712353989',
'13974614233',
'13905135932',
'17745566777',
'18858116668',
'13929811166',
'13798505258',
'13974666687',
'13328015708',
'13036772112',
'15607466688',
'18666661952',
'18075825833',
'13587679856',
'18961342777',
'13726620992',
'17702761239',
'13587885852',
'15111672258',
'18261468013',
'18826011859',
'13382609477',
'13327267559',
'15529606066',
'15950739678',
'15013839006',
'15951250663',
'13926155181',
'13922210439',
'18922556660',
'15606662121',
'13716868575',
'15233507000',
'15851058873',
'18028939070',
'13574687897',
'18883333388',
'18684972833',
'18657677659',
'13760858722',
'18607463066',
'13702750934',
'15603725166',
'13926510065',
'15574647008',
'13037487979',
'13529677368',
'18819704961',
'13974639713',
'15888216977',
'13802928525',
'18932104211',
'15116295988',
'18988599225',
'13902537061',
'13974679766',
'15574688089',
'15228099877',
'15999587129',
'13886521777',
'13928909213',
'13874639698',
'13822662768',
'13243677626',
'13117468333',
'15807497979',
'18166103838',
'15116689968',
'18674463352',
'13135279863',
'18077872707',
'15889773569',
'18613090933',
'18988990816',
'13826988385',
'13903163682',
'18641159677',
'13662923412',
'13705105206',
'13107160629',
'15616876879',
'18974623812',
'13557283322',
'13717032918',
'13031877088',
'18670504888',
'18961991559',
'15874610888',
'13884372282',
'15285919707',
'15074606201',
'15863086168',
'13421280322',
'18274638522',
'13811847691',
'18626026859',
'15344495693',
'18692680555',
'18608462211',
'15575396468',
'18777357888',
'18984079188',
'13037497998',
'13957040769',
'13802746180',
'13734888435',
'18609962459',
'15829334888',
'18013522258',
'15961935959',
'17773455388',
'18406719997',
'13985181904',
'15364439833',
'17712604751',
'13707462886',
'13529802645',
'13775071222',
'15570635606',
'13891282566',
'18674662237',
'18126167588',
'18803301105',
'13725645999',
'13396483555',
'15820366499',
'13128945177',
'18944973555',
'15807471069',
'13819653398',
'18272030888',
'13087283849',
'13984353604',
'13642345995',
'15211138227',
'15211601105',
'13974633125',
'17788921277',
'13824491868',
'15185107378',
'13687281278',
'13906189697',
'15185972400',
'18961991559',
'15961935959',
'15061629797',
'15365766658',
'13382609477',
'15851058873',
'13705105206',
'13707981967',
'13621465456',
'15285919707',
'15364439833',
'13725645999',
'15820366499',
'13421208478',
'13421280322',
'13421280322',
'13087283849',
        );
        $data = array(
            'jsData' => json_encode(array('id'=>25,'mobile'=>$mobile)),
            'tempId'		=> 'temp_'.F::getGID(),
        );

        $this->setReplaceData($data);
        $this->setTempAndData();
        $this->show();
    }
}
