<?php
namespace Ad5001\CustomCraft;
use pocketmine\plugin\PluginBase;
use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\Item;
use pocketmine\nbt\JsonNBTParser;


class Main extends PluginBase{


   public function onEnable(){
        foreach($this->getConfig()->getAll() as $craft) {
            $result = $this->getItem($craft["result"]);
            $rec = new ShapedRecipe(["abc","def","ghi"], [
		    "a" => $this->getItem($craft["shape"][0][0]),
		    "b" => $this->getItem($craft["shape"][0][1]),
		    "c" => $this->getItem($craft["shape"][0][2]),
		    "d" => $this->getItem($craft["shape"][1][0]),
		    "e" => $this->getItem($craft["shape"][1][1]),
		    "f" => $this->getItem($craft["shape"][1][2]),
		    "g" => $this->getItem($craft["shape"][2][0]),
		    "h" => $this->getItem($craft["shape"][2][1]),
		    "i" => $this->getItem($craft["shape"][2][2]),
	    ], [$result]);
            $this->getServer()->getCraftingManager()->registerRecipe($rec);
            $this->getLogger()->info("Registered recipe for " . $this->getItem($craft["result"])->getName());
        }
    }


    public function onLoad(){
        $this->saveDefaultConfig();
    }
    
    
    
    public function getItem(array $item) : Item {
        $result = Item::fromString($item[0]);
        if(isset($item[1])) {
        	$result->setCount((int) $item[1]);
        }
        if(isset($item[2])) {
            $tags = $exception = null;
            $data = $item[2];
			try{
				$tags = JsonNBTParser::parseJSON($data);
			}catch (\Throwable $ex){
				$exception = $ex;
			}

			if(!($tags instanceof \pocketmine\nbt\tag\CompoundTag) or $exception !== null){
				$this->getLogger()->warning("Could not get item [" . implode(", ", $item) . "] : " . $exception->getMessage());
				return $result;
			}
            
            $result->setNamedTag($tags);
        }
        return $result;
    }
}
