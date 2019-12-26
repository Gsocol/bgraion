<?php namespace App\Http\Controllers;

	use crocodicstudio\crudbooster\helpers\CRUDBooster;
    use http\Env\Response;
    use Illuminate\Support\Facades\Route;
    use Session;
	use Request;
	use DB;


	class AdminFullTable26Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name_raion";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "full_table";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Учреждение","name"=>"naim_sokr"];
			$this->col[] = ["label"=>"Населенный пункт","name"=>"name_np"];
			$this->col[] = ["label"=>"Руководитель","name"=>"fio_rukovod"];
			$this->col[] = ["label"=>"ИНН","name"=>"inn"];
			$this->col[] = ["label"=>"КПП","name"=>"kpp"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Район','name'=>'name_raion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'МО','name'=>'name_mo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Нас. пункт','name'=>'name_np','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Полное наименование','name'=>'naim_full','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Краткое','name'=>'naim_sokr','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Юр. адрес','name'=>'ur_adres','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Факт. адрес','name'=>'fact_adres','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'ОГРН','name'=>'ogrn','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Дата ОГРН','name'=>'data_ogrn','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'ИНН','name'=>'inn','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'КПП','name'=>'kpp','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'ОКПО','name'=>'okpo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Кол. строений','name'=>'kol_stroen','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Код телефона','name'=>'kod_telef','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Телефон','name'=>'telef','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Код факса','name'=>'kod_faks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Факс','name'=>'faks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Coord Y','name'=>'coord_y','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Coord X','name'=>'coord_x','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email','width'=>'col-sm-10','placeholder'=>'Введите правильный email адрес'];
			$this->form[] = ['label'=>'Сайт','name'=>'site','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Руководитель','name'=>'fio_rukovod','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Должность','name'=>'dolg_rukovod','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Sektor','name'=>'vk_sektor','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Kupol','name'=>'vk_kupol','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Uprav','name'=>'vk_uprav','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Narush','name'=>'vk_narush','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Vnutr','name'=>'vk_vnutr','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Analog','name'=>'vk_analog','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vk Cifr','name'=>'vk_cifr','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol Vk Narush','name'=>'kol_vk_narush','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol Vk Vnutr','name'=>'kol_vk_vnutr','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol Vk Vsego','name'=>'kol_vk_vsego','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Opis Videokamer','name'=>'opis_videokamer','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Server Vk Nazv','name'=>'server_vk_nazv','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Server Po','name'=>'server_po','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Plan Video','name'=>'is_plan_video','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Дней хранения','name'=>'dni_xranen','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Udalen','name'=>'is_udalen','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Да;Нет'];
			$this->form[] = ['label'=>'Is Internet','name'=>'is_internet','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Договор интернета','name'=>'dogovor_internet','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Metal Detekt','name'=>'is_metal_detekt','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol Metal Detekt','name'=>'kol_metal_detekt','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Knopka','name'=>'is_knopka','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Bg','name'=>'is_bg','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Video Primech','name'=>'video_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol Ts','name'=>'kol_ts','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol M1','name'=>'kol_m1','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol M2','name'=>'kol_m2','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol M3','name'=>'kol_m3','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol M4','name'=>'kol_m4','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol N1','name'=>'kol_n1','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol N2','name'=>'kol_n2','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kol N3','name'=>'kol_n3','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Model Ts','name'=>'model_ts','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Model Glonass','name'=>'model_glonass','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Po Glonass','name'=>'po_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Obslug Glonass','name'=>'obslug_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Oper Sv Glonass','name'=>'oper_sv_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Glonass Bg','name'=>'is_glonass_bg','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ts Primech','name'=>'ts_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Teplo','name'=>'pi_teplo','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Dim','name'=>'pi_dim','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Gaz','name'=>'pi_gaz','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Plamya','name'=>'pi_plamya','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Kombin','name'=>'pi_kombin','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Ioniz','name'=>'pi_ioniz','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Svet','name'=>'pi_svet','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pi Ruchnoi','name'=>'pi_ruchnoi','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Pi Provod','name'=>'is_pi_provod','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Pi Besprovod','name'=>'is_pi_besprovod','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Models Pi','name'=>'models_pi','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Model Pult','name'=>'model_pult','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Proekt Ps','name'=>'is_proekt_ps','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Is Edds','name'=>'is_edds','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ps Primech','name'=>'ps_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Вид учреждения','name'=>'vid_uchreshden','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>'true'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Район','name'=>'name_raion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'МО','name'=>'name_mo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Нас. пункт','name'=>'name_np','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Полное наименование','name'=>'naim_full','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Краткое','name'=>'naim_sokr','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Юр. адрес','name'=>'ur_adres','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Факт. адрес','name'=>'fact_adres','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'ОГРН','name'=>'ogrn','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дата ОГРН','name'=>'data_ogrn','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'ИНН','name'=>'inn','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'КПП','name'=>'kpp','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'ОКПО','name'=>'okpo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Кол. строений','name'=>'kol_stroen','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Код телефона','name'=>'kod_telef','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Телефон','name'=>'telef','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Код факса','name'=>'kod_faks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Факс','name'=>'faks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Coord Y','name'=>'coord_y','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Coord X','name'=>'coord_x','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email','width'=>'col-sm-10','placeholder'=>'Введите правильный email адрес'];
			//$this->form[] = ['label'=>'Сайт','name'=>'site','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Руководитель','name'=>'fio_rukovod','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Должность','name'=>'dolg_rukovod','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Sektor','name'=>'vk_sektor','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Kupol','name'=>'vk_kupol','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Uprav','name'=>'vk_uprav','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Narush','name'=>'vk_narush','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Vnutr','name'=>'vk_vnutr','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Analog','name'=>'vk_analog','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Vk Cifr','name'=>'vk_cifr','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol Vk Narush','name'=>'kol_vk_narush','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol Vk Vnutr','name'=>'kol_vk_vnutr','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol Vk Vsego','name'=>'kol_vk_vsego','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Opis Videokamer','name'=>'opis_videokamer','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Server Vk Nazv','name'=>'server_vk_nazv','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Server Po','name'=>'server_po','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Plan Video','name'=>'is_plan_video','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дней хранения','name'=>'dni_xranen','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Udalen','name'=>'is_udalen','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Да;Нет'];
			//$this->form[] = ['label'=>'Is Internet','name'=>'is_internet','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Договор интернета','name'=>'dogovor_internet','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Metal Detekt','name'=>'is_metal_detekt','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol Metal Detekt','name'=>'kol_metal_detekt','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Knopka','name'=>'is_knopka','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Bg','name'=>'is_bg','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Video Primech','name'=>'video_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol Ts','name'=>'kol_ts','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol M1','name'=>'kol_m1','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol M2','name'=>'kol_m2','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol M3','name'=>'kol_m3','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol M4','name'=>'kol_m4','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol N1','name'=>'kol_n1','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol N2','name'=>'kol_n2','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kol N3','name'=>'kol_n3','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Model Ts','name'=>'model_ts','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Model Glonass','name'=>'model_glonass','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Po Glonass','name'=>'po_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Obslug Glonass','name'=>'obslug_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Oper Sv Glonass','name'=>'oper_sv_glonass','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Glonass Bg','name'=>'is_glonass_bg','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ts Primech','name'=>'ts_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Teplo','name'=>'pi_teplo','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Dim','name'=>'pi_dim','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Gaz','name'=>'pi_gaz','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Plamya','name'=>'pi_plamya','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Kombin','name'=>'pi_kombin','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Ioniz','name'=>'pi_ioniz','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Svet','name'=>'pi_svet','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pi Ruchnoi','name'=>'pi_ruchnoi','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Pi Provod','name'=>'is_pi_provod','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Pi Besprovod','name'=>'is_pi_besprovod','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Models Pi','name'=>'models_pi','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Model Pult','name'=>'model_pult','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Proekt Ps','name'=>'is_proekt_ps','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Edds','name'=>'is_edds','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ps Primech','name'=>'ps_primech','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Вид учреждения','name'=>'vid_uchreshden','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>'true'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }

	    public function getDetail($id)
        {
           // dump($id);
            $this->cbLoader();
            $row = \Illuminate\Support\Facades\DB::table($this->table)->where($this->primary_key, $id)->first();

            if (! CRUDBooster::isRead() && $this->global_privilege == false || $this->button_detail == false) {
                CRUDBooster::insertLog(trans("crudbooster.log_try_view", [
                    'name' => $row->{$this->title_field},
                    'module' => CRUDBooster::getCurrentModule()->name,
                ]));
                CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
            }

            $module = CRUDBooster::getCurrentModule();

            $page_menu = Route::getCurrentRoute()->getActionName();
            $page_title = trans("crudbooster.detail_data_page_title", ['module' => $module->name, 'name' => $row->{$this->title_field}]);
            $command = 'detail';

            \Illuminate\Support\Facades\Session::put('current_row_id', $id);

//dd($row);


                $nom_raion = CRUDBooster::getValue()['r'];
                $nazv_raiona = str_replace('район','муниципальный район',$row->name_raion);
            $nom_raion = \Illuminate\Support\Facades\DB::table('raions')->where('name_full',$nazv_raiona)->first()->id;

            return view('BgDetail', compact('row', 'page_menu', 'page_title', 'command', 'id','nom_raion'));

            //        return parent::getDetail($id); // TODO: Change the autogenerated stub
        }

        public function getEdit($id)
        {

            $this->cbLoader();
            $row = DB::table($this->table)->where($this->primary_key, $id)->first();

            if (! CRUDBooster::isRead() && $this->global_privilege == false || $this->button_edit == false) {
                CRUDBooster::insertLog(trans("crudbooster.log_try_edit", [
                    'name' => $row->{$this->title_field},
                    'module' => CRUDBooster::getCurrentModule()->name,
                ]));
                CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
            }

            $page_menu = Route::getCurrentRoute()->getActionName();
            $page_title = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name, 'name' => $row->{$this->title_field}]);
            $command = 'edit';
            Session::put('current_row_id', $id);
            $nazv_raiona = str_replace('район','муниципальный район',$row->name_raion);
            $nom_raion = \Illuminate\Support\Facades\DB::table('raions')->where('name_full',$nazv_raiona)->first()->id;

            return view('BgEdit', compact('id', 'row', 'page_menu', 'page_title', 'command','nom_raion'));




            //return parent::getEdit($id); // TODO: Change the autogenerated stub
        }


        public function getIndex() {
            //First, Add an auth
//            dd(CRUDBooster);
            if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
            $znach=DB::table('full_table')->distinct()->pluck('vid_uchreshden'); // Получаем список значей поля вид ужреждения
            $raions=DB::table('raions')->pluck('name_full','id'); // Получаем список значей названий районов
            $name_raion=CRUDBooster::myPrivilegeName();

            if ($name_raion=='Super Administrator') {
                $name_raion = $raions[CRUDBooster::getValue()['r']];

            }
            //Create your own query
            parent::setRaion(15);
            $this->nom_raion=CRUDBooster::getValue()['r'];
            $n_raion=str_replace('муниципальный район','район',$name_raion);
            $data = [];
            $zapisi = [];
            foreach ($znach as $key=>$value)
            {
              $zapisi[$value]=DB::table('full_table')->where([['name_raion','=',$n_raion],['vid_uchreshden','=',$value]])->orderby('id','desc')->paginate(20, ['*'], 'page_'.$key.'s');
            }
            $data['page_title'] = $n_raion;
            $data['result']=$zapisi;
            $data['znach']=$znach;
            //dump($data);
            //$data['result'] = DB::table('full_table')->where([['name_raion','=',$name_raion],['vid_uchreshden','=','школы']])->orderby('id','desc')->paginate(20, ['*'], 'page_1s');
            //$data['result2'] = DB::table('full_table')->where([['name_raion','=',$name_raion],['vid_uchreshden','=','медицина']])->orderby('id','desc')->paginate(15, ['*'], 'page_2s');
            //$data['result3'] = DB::table('full_table')->where([['name_raion','=',$name_raion],['vid_uchreshden','=','культура']])->orderby('id','desc')->paginate(15, ['*'], 'page_3s');

            //Create a view. Please use `cbView` method instead of view method from laravel.
            $this->cbView('BgIndex',$data);
        }

        public function getSelsovets($id_raion){

            $selsovet = json_encode(DB::table('selsovet')->select('id','Name')->where('id_raion',$id_raion)->get());  // Ищем район с нужным номером
            return Response($selsovet);
        }

        public function getNaspunkts($name_sels){

            $nas_p = json_encode(DB::table('naspunkt')->leftJoin('type_naspunkt','naspunkt.id_type','=','type_naspunkt.id')->select('naspunkt.id','naspunkt.Name','type_naspunkt.sokr_nazv as sokr')->where('id_selsovet',$name_sels)->get());  // Ищем район с нужным номером
            return Response($nas_p);
        }




	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
//            $a=$_POST;
//	        if (isset($_POST['vk_sector']))
//            {
//                $postdata['vk_sector']='Да';
//            } else
//                {
//                    $postdata['vk_sector']='Нет';
//                }
            $postdata['data_ogrn']=date('Y-m-d',strtotime($postdata['data_ogrn']));

         //   dd($postdata);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {


	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}