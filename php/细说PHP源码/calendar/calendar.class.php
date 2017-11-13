<?php
	/*
		file:calendar.class.php 日历类原文件
		声明一个日历类，名称为Calendar,用来显示一个可以设置日期的日历
	*/
	class Calendar {
		private $year;				 	  //当前的年
		private $month; 				  //当前的月
		private $start_weekday; 		  //当月的第一天对应的是周几，作为当月开始遍历日期的开始
		private $days; 				 	  //当前月一总天数

		/* 构造方法，用来初使化一些日期属性  */
		function __construct(){
			/* 如果用户没有设置年份数，则使用当前系统时间的年份 */
			$this->year = isset($_GET["year"]) ? $_GET["year"] : date("Y");
			/* 如果用户没有设置月份数，则使用当前系统时间的用份 */
			$this->month = isset($_GET["month"]) ? $_GET["month"] : date("m");
			/* 通过具体的年份和月份，利用date()函数的w参数获取当月第一天对应的是周几 */
			$this->start_weekday = date("w", mktime(0, 0, 0, $this->month, 1, $this->year));
			/* 通过具体的年份和月份，利用date()函数的t参数获取当月的天数 */
			$this->days = date("t", mktime(0, 0, 0, $this->month, 1, $this->year));
		}
		
		/* 魔术方法用于打印整个日历 */
		function __toString(){
			$out .= '<table align="center">'; //日历以表格形式打印
			$out .= $this->chageDate();       //调用内部私有方法用于用户自己设置日期
			$out .= $this->weeksList();       //调用内部私有方法打印“周”列表
			$out .= $this->daysList();        //调用内部私有方法打印“日”列表
			$out .= '</table>';               //表格结束
			return $out;                      //返回整个日历输出需要的全部字符串
		}
		
		/* 内部调用的私有方法，用于输出周列表 */
		private function weeksList(){
			$week = array('日','一','二','三','四','五','六');

			$out .= '<tr>';
			for($i = 0; $i < count($week); $i++)
				$out .= '<th class="fontb">'.$week[$i].'</th>'; //第一行以表格<th>形式输出周列表

			$out .= '</tr>';
			return $out;                      //返回周列表字符串  
		}
		
		/* 内部调用的私有方法，用于输出日列表 */
		private function daysList(){
			$out .= '<tr>';
			/* 输出空格(当前一月第一天前面要空出来) */
			for($j = 0; $j < $this->start_weekday; $j++)
				$out .= '<td>&nbsp;</td>';

			/* 将当月的所有日期循环遍历出来，如果是当前日期，为其设置深色背景 */
			for($k = 1; $k <= $this->days; $k++){
				$j++;
				if($k == date('d'))
					$out .= '<td class="fontb">'.$k.'</td>';
				else
					$out .= '<td>'.$k.'</td>';
				
				if($j%7 == 0)                        //每输出7个日期，就换一行
					$out .= '</tr><tr>';             //输出行结束和下一行开始
			}

			while($j%7 !== 0){						 //遍历完日期后，将后面用空格补齐 
				$out .= '<td>&nbsp;</td>';           //使用空格去补
				$j++;
			}

			$out .= '</tr>';
			return $out;                             //返回当月日期列表
		}
		
		/* 内部调用的私有方法，用于处理当前年份的上一年需要的数据 */
		private function prevYear($year, $month){
			$year = $year-1;                         //上一年是当前年减1
			
			if($year < 1970)                         //如果设置的年份小于1970年
				$year = 1970;                        //年份设置最小值是1970年

			return "year={$year}&month={$month}";	 //返回最终的年份和月份设置参数
		}

		/* 内部调用的私有方法，用于处理当前月份的上一月份的数据 */
		private function prevMonth($year, $month){
			if($month == 1) {                       //如果月份已经是1月
				$year = $year -1;                   //则上一个月份，就是上一年的最后一月
		
				if($year < 1970)                    //和前面一样，上一年如果是最1970年
					$year = 1970;                   //最小年数不能小于1970年

				$month=12;                          //如果月是1月，上一月就是上一年的最后一月
			}else{
				$month--;                           //上一月就是当前月减1
			}

			return "year={$year}&month={$month}";	//返回最终的年份和月份设置参数
		}

		/* 内部调用的私有方法，用于处理当前年份的下一年份的数据 */
		private function nextYear($year, $month){
			$year = $year + 1;                       //下一年是当前年加1

			if($year > 2038)                         //如果设置的年份大于2038年
				$year = 2038;                        //最大年份不能超过2038年

			return "year={$year}&month={$month}";	 //返回最终的年份和月份设置参数
		}

		/* 内部调用的私有方法，用于处理当前月份的下一个月份的数据 */
		private function nextMonth($year, $month){
			if($month == 12){                        //如果已经是当年的最后一个月
				$year++;                             //下一个月就是下一年的第一个月，让年份加1年

				if($year > 2038)                     //如果设置的年份大于2038年
					$year = 2038;                    //最大年份不能超过2038年

				$month = 1;                          //设置月份为下一年的第1月
			}else{
				$month++;                            //其它月份的下一个月都是当前月份加1即可
			}
			
			return "year={$year}&month={$month}";	 //返回最终的年份和月份设置参数
		}

		//内部调用的私有方法，用于用户操作去调整年份和月份的设置
		private function chageDate($url="index.php"){
			$out .= '<tr>';
			$out .= '<td><a href="'.$url.'?'.$this->prevYear($this->year, $this->month).'">'.'<<'.'</a></td>';
			$out .= '<td><a href="'.$url.'?'.$this->prevMonth($this->year, $this->month).'">'.'<'.'</a></td>';
			
			$out .= '<td colspan="3">';
			$out .= '<form>';
			$out .= '<select name="year" onchange="window.location=\''.$url.'?year=\'+this.options[selectedIndex].value+\'&month='.$this->month.'\'">';
			for($sy=1970; $sy <= 2038; $sy++){
				$selected = ($sy==$this->year) ? "selected" : "";
				$out .= '<option '.$selected.' value="'.$sy.'">'.$sy.'</option>';
			}
			$out .= '</select>';
			$out .= '<select name="month"  onchange="window.location=\''.$url.'?year='.$this->year.'&month=\'+this.options[selectedIndex].value">';
			for($sm=1; $sm<=12; $sm++){
				$selected1 = ($sm==$this->month) ? "selected" : "";
				$out .= '<option '.$selected1.' value="'.$sm.'">'.$sm.'</option>';
			}
			$out .= '</select>';
			$out .= '</form>';	
			$out .= '</td>';

			$out .= '<td><a href="'.$url.'?'.$this->nextYear($this->year, $this->month).'">'.'>>'.'</a></td>';
			$out .= '<td><a href="'.$url.'?'.$this->nextMonth($this->year, $this->month).'">'.'>'.'</a></td>';
			$out .= '</tr>';
			return $out;                              //返回调整日期的表单
		}
	}
