<?php 

$arr = array(7,8,1,5,2,4,3,6);
$c = count($arr);



//冒泡算法
// for ($i=0; $i<$c; $i++) { 

// 	for ($j=0;$j<$c-1;$j++) { 
// 		if($arr[$j]>$arr[$j+1]){
// 			$temp = $arr[$j];
// 			$arr[$j]=$arr[$j+1	];
// 			$arr[$j+1]=$temp;
// 	    }
	
// 	}
// }



//选择排序
for ($i=0;$i<$c;$i++) { 
      //假设最小的位置为$i;
	   $min = $i;
	  for ($j=$i;$j<$c ;$j++) { 
		 if($arr[$min]>$arr[$j]){
	        $min = $j;
		 }
	 }
	 if($min != $i){
	 	$temp = $arr[$min];
	 	$arr[$min] = $arr[$i];
	 	$arr[$i] = $temp;
	 }
}

//快速排序
// function Quick($arr){
// 	   if(count($arr)<=1){
// 	   	  return  $arr;
// 	   }
//        $temp = $arr[0];
//        $left = [];
//        $rigth = [];
// 	   for ($i=1; $i < count($arr); $i++) { 
// 	          if($arr[$i]>$temp){
// 	          	 $rigth[]=$arr[$i];
// 	          }else{
// 	          	$left[]=$arr[$i];
// 	          }
// 	   }

//        $left = Quick($left);
//        $rigth = Quick($rigth);

// 	   return array_merge($left,array($temp),$rigth);
// }
// $a = Quick($arr);



//插入排序
  for ($i=0;$i<$c;$i++) { 
  	  //首先取出一个有序的数组
  	  $temp  = $arr[$i];
  	  //循环,先从取出来有序的值的前一个开始,满足大于等于0的条件,递减
       for ($j=$i-1;$j>=0;$j--) { 
       	   //判断,如果有序的值小,互换位置
       	   if($temp<$arr[$j]){
              $arr[$j+1]=$arr[$j];
              $arr[$j]=$temp;
       	   }else{
       	   	 break;
       	   }
       } 

  }



//堆排序（对简单选择排序的改进）

function swap(array &$arr,$a,$b){
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
}

//调整 $arr[$start]的关键字，使$arr[$start]、$arr[$start+1]、、、$arr[$end]成为一个大根堆（根节点最大的完全二叉树）
//注意这里节点 s 的左右孩子是 2*s + 1 和 2*s+2 （数组开始下标为 0 时）
function HeapAdjust(array &$arr,$start,$end){
    $temp = $arr[$start];
    //沿关键字较大的孩子节点向下筛选
    //左右孩子计算（我这里数组开始下标识 0）
    //左孩子2 * $start + 1，右孩子2 * $start + 2
    for($j = 2 * $start + 1;$j <= $end;$j = 2 * $j + 1){
        if($j != $end && $arr[$j] < $arr[$j + 1]){
            $j ++; //转化为右孩子
        }
        if($temp >= $arr[$j]){
            break;  //已经满足大根堆
        }
        //将根节点设置为子节点的较大值
        $arr[$start] = $arr[$j];
        //继续往下
        $start = $j;
    }
    $arr[$start] = $temp;
}

function HeapSort(array &$arr){
    $count = count($arr);
    //先将数组构造成大根堆（由于是完全二叉树，所以这里用floor($count/2)-1，下标小于或等于这数的节点都是有孩子的节点)
    for($i = floor($count / 2) - 1;$i >= 0;$i --){
        HeapAdjust($arr,$i,$count);
    }
    for($i = $count - 1;$i >= 0;$i --){
        //将堆顶元素与最后一个元素交换，获取到最大元素（交换后的最后一个元素），将最大元素放到数组末尾
        swap($arr,0,$i);  
        //经过交换，将最后一个元素（最大元素）脱离大根堆，并将未经排序的新树($arr[0...$i-1])重新调整为大根堆
        HeapAdjust($arr,0,$i - 1);
    }
}

$arr = array(4,1,5,9);
HeapSort($arr);

 ?>