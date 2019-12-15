### 数据结构与算法

### 概述：

通过最近时间的学习，发现数据结构与算法是紧密相连的。而我之前一直以为，数据结构是数据结构，算法是算法。正确的概念是，数据结构是更底层的一个东西，最为基础。算法的实现依赖于数据结构，作为算法的一个支撑。最明显的一个例子就是广度优先搜索，他的实现依赖于队列，当我看到他的解决方案是如此的简单时，叹为观止。以前对算法的误解实在太深了。通过本次学习，我也更加坚信一点，没有学不会的知识，如果有，那一定是教材有问题。换一个教材试一试。而且自身对于图形化的东西确实更容易接受。

算法是一种优秀的思想，我要好好学习。

学习的过程中，多用笔纸实际的推演，代码跟着笔纸的推演进行实现。发现很多临界条件，就是因为稍微的差别，但却一个是死循环，一个是正确的，最终发现程序没有完全按照推导图中所示。



### 排序与查找

很多高效查找的算法都依赖于排序。

比如二分查找，包括b+tree的查找，前提都是数据是有序的。因此排序与查找的算法密不可分。算法大体也是分为两类：排序与查找。



### 已实现的算法：

+ 选择排序
+ 快速排序
+ 二分查找
+ 广度优先搜索。图相关---最短路径查找



### 选择排序

两遍for 循环。

第一步：一遍用于查找当前数组中的最小值。

第二步：一遍用于遍历N个元素。

第三步：已经找到的最小值，从原数组中要剔除，不再参与第一步。



### 快速排序

分而治之的一种体现。由简入繁，从最简单的情况做起，找出规律。1,2,3,4,5策略。

找出简单的基准条件，对数组而言，一般就是为空或者只有一个的时候。

不断的缩小范围，使其靠近基线条件。

大数组= left array+[基准值]+right array

对大数组的快速排序，转而成为对左、右数组的各自子数组的快速排序。





### 二分查找

东西对进，一半一半的缩小范围。

max _index = mid -1

min_index = mid +1 

临界条件 min_index <= max_index



### 广度优先搜索

先从朋友中查找，再从朋友的朋友中查找，再从朋友的朋友的朋友中查找。

那如何实现这种方案呢？关键在队列。

先将自己的直系朋友添加到队列中，如果没找到，就把朋友的朋友追加在队列的末尾，以此类推。 















