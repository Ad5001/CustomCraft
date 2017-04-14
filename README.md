# CustomCraft
Make your own custom brand new Items and crafts !

## Description:
This plugin allows you to add custom crafts on your crftaing table juswt by modifing a simple config !		
You can configure: Any item of the craft, it's place, it's count, and it's DATA TAGS : 			
```
{display:{Name:"CUSTOM ITEM !!!!"}}
``` ! You can also do this for the result.

## How to create your custom craft?
1. Go to the config.
2. You will see an example, copy/modify it.
3. Here is the structure that youc an change as your desire: () are optionals.
```
#Craft id make sure to never have same two times
1:
  # Define the shape of the craft; Items are organized like this: "[id(:damage)"(, count(, "data tags"))]". Example: ["325:8", 1, "{display:{Name:Example}}"].
  shape:
# 1st row
  - [item 1], [item 2], [item 3]]
# 2nd row
  - [[item 1], [item 2], [item 3]]
# 3rd row
  - [[item 1], [item 2], [item 3]]
# Note that they will be organized like this in the crafting table.
# The result
  result: [result item.]
```